<?php

/* Offline runtime probe: load the SDK's real models and serializer. */
spl_autoload_register(function ($name) {
    $parts = explode('\\', ltrim($name, '\\'));
    $parts[0] = strtolower($parts[0]);
    $file = getcwd() . '/' . implode('/', $parts) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});
function ensure($value, $message)
{
    if (!$value) {
        throw new RuntimeException($message);
    }
}
function sdkclass($name)
{
    foreach (['Model\\', 'Request\\aba\\', 'Response\\aba\\'] as $prefix) {
        if (class_exists($prefix . $name)) {
            return $prefix . $name;
        }
    }
    throw new RuntimeException('Class missing: ' . $name);
}
function shape($type)
{
    if (substr($type, -2) === '[]') {
        return ['type' => 'array','items' => shape(substr($type, 0, -2))];
    }
    if (preg_match('/^(array<|map\[)/', $type)) {
        return ['type' => 'object','additionalProperties' => ['type' => 'string'],'properties' => (object)[]];
    }
    $primitive = ['string' => 'string','int' => 'integer','integer' => 'integer','float' => 'number','double' => 'number','bool' => 'boolean','boolean' => 'boolean'];
    if (isset($primitive[$type])) {
        return ['type' => $primitive[$type]];
    }
    $parts = explode('\\', $type);
    return ['$ref' => '#/components/schemas/'.end($parts)];
}
function sample($type)
{
    if (substr($type, -2) === '[]') {
        return ['HKD','USD'];
    }
    if (preg_match('/^(array<|map\[)/', $type)) {
        return ['probe' => 'value'];
    }
    if ($type === 'string') {
        return 'probe';
    }
    if (in_array($type, ['int','integer','float','double'])) {
        return 0;
    }
    if (in_array($type, ['bool','boolean'])) {
        return false;
    }
    $class = ltrim($type, '\\');
    return new $class();
}
function body($obj)
{
    return json_decode(json_encode($obj, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
}
function policyEquivalent($value)
{
    if (!is_array($value)) {
        return $value;
    }
    foreach ($value as $key => $member) {
        // This one target parent explicitly treats omitted/null/{} as inheritance.
        if ($key === 'paymentPreference' && $member === null) {
            unset($value[$key]);
        } else {
            $value[$key] = policyEquivalent($member);
        }
    }
    return $value;
}
$request = json_decode(stream_get_contents(STDIN), true, 512, JSON_THROW_ON_ERROR);
$models = [];
foreach ($request['models'] as $name) {
    $class = sdkclass($name);
    $obj = new $class();
    $props = [];
    foreach ($class::openAPITypes() as $property => $type) {
        $value = sample($type);
        $allow = 'get'.ucfirst($property).'AllowableValues';
        if (method_exists($obj, $allow)) {
            $values = $obj->$allow();
            if ($values) {
                $value = $values[0];
            }
        }
        $setter = $class::setters()[$property];
        $obj->$setter($value);
        $props[$class::attributeMap()[$property]] = shape($type);
    }
    $wire = body($obj);
    $round = \Model\ObjectSerializer::deserialize(json_encode($obj), $class);
    ensure(policyEquivalent(body($round)) === policyEquivalent($wire), 'roundtrip '.$name.' before='.json_encode($wire).' after='.json_encode(body($round)));
    $keys = array_keys($wire);
    $expectedKeys = array_keys($props);
    sort($keys);
    sort($expectedKeys);
    ensure($keys === $expectedKeys, 'all wire keys '.$name);
    $models[$name] = ['type' => 'object','properties' => $props];
}
foreach (['ApplyCardPaymentPreference','CardPaymentPreference'] as $name) {
    $class = sdkclass($name);
    $obj = new $class();
    ensure(is_object(json_decode(json_encode($obj))), 'empty preference must be object');
    $obj->setCurrencyOrder([]);
    ensure(body($obj)['currencyOrder'] === [], 'empty array preserved');
    $obj->setCurrencyOrder(['HKD','USD']);
    ensure(body($obj)['currencyOrder'] === ['HKD','USD'], 'currency order');
    $obj->setCurrencyOrder(null);
    ensure(!array_key_exists('currencyOrder', body($obj)), 'SDK null omission');
}
foreach (['AlipayInquireCardDetailResponse','AlipayInquireCardSensitiveInfoResponse'] as $name) {
    $wire = ['authorizationControl' => ['paymentPreference' => ['currencyOrder' => ['HKD','USD']]]];
    if (str_contains($name, 'Sensitive')) {
        $wire = ['cardDetail' => $wire];
    }
    $obj = \Model\ObjectSerializer::deserialize(json_encode($wire), sdkclass($name));
    $decoded = body($obj);
    if (str_contains($name, 'Sensitive')) {
        $decoded = $decoded['cardDetail'];
    }
    ensure($decoded['authorizationControl']['paymentPreference']['currencyOrder'] === ['HKD','USD'], 'nested inquiry parsing');
}
$bindings = [];
foreach (['ApplyCard','InquireCardDetail','InquireCardSensitiveInfo'] as $stem) {
    $class = sdkclass('Alipay'.$stem.'Request');
    $obj = new $class();
    $response = sdkclass('Alipay'.$stem.'Response');
    $bindings[] = ['path' => $obj->getPath(),'method' => $obj->getHttpMethod(),'request' => (new ReflectionClass($obj))->getShortName(),'response' => (new ReflectionClass($response))->getShortName()];
}
echo json_encode(['models' => $models,'bindings' => $bindings,'wire_checks' => count($models),'evidence' => ['Native PHP openAPITypes/attributeMap, setters, JsonSerializable and ObjectSerializer; no-arg construction, ordered/empty arrays, null omission and sensitive nested readback']], JSON_THROW_ON_ERROR);
