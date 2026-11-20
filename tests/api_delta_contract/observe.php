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
    foreach (['model','request','response'] as $base) {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base)) as $file) {
            if ($file->isFile() && $file->getFilename() === $name.'.php') {
                $text = file_get_contents($file->getPathname());
                if (preg_match('/namespace\\s+([^;]+);/', $text, $match)) {
                    $class = trim($match[1]).'\\'.$name;
                    if (class_exists($class)) {
                        return $class;
                    }
                }
            }
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
        return [sample(substr($type, 0, -2)),sample(substr($type, 0, -2))];
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
foreach ($request['models'] as $target) {
    $parts = explode('/', $target);
    $name = end($parts);
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
    $models[$target] = ['type' => 'object','properties' => $props];
}
$evidence = [];
try {
    $class = sdkclass('ConsultBuyer');
    $buyer = new $class();
    foreach (['true','false'] as $value) {
        $buyer->setBuyerAccessGroupFlag($value);
        ensure(body($buyer)['buyerAccessGroupFlag'] === $value, 'string buyer flag');
        $qc = sdkclass('AlipayPayConsultRequest');
        $q = new $qc();
        $q->setBuyer($buyer);
        ensure(body($q)['buyer']['buyerAccessGroupFlag'] === $value, 'nested buyer request');
    }
    $buyer->setBuyerAccessGroupFlag(null);
    ensure(!array_key_exists('buyerAccessGroupFlag', body($buyer)), 'unset flag omission');
    $evidence[] = 'Actual PHP consult serializer preserves true/false strings and omitted flag';
} catch (RuntimeException $e) {
    if (!str_starts_with($e->getMessage(), 'Class missing:')) {
        throw $e;
    }
}
foreach ($request['models'] as $target) {
    $parts = explode('/', $target);
    $name = end($parts);
    $class = sdkclass($name);
    if (!method_exists($class, 'getCreditNoteIds')) {
        continue;
    }
    foreach ([[],['creditNoteIds' => null],['creditNoteIds' => []],['creditNoteId' => 'cn_a','creditNoteIds' => ['cn_a'],'creditNoteAmount' => '3000','creditNoteCurrency' => 'USD'],['creditNoteIds' => ['cn_a','cn_z'],'creditNoteAmount' => '8000','creditNoteCurrency' => 'USD']] as $fixture) {
        $o = \Model\ObjectSerializer::deserialize(json_encode((object)$fixture), $class);
        $actual = body($o);
        foreach ($fixture as $k => $v) {
            if ($v !== null) {
                ensure($actual[$k] === $v, 'subscription field '.$k);
            }
        }
    }
    $evidence[] = 'Actual PHP parsing preserves ordered credit-note IDs, scalar, amount string, and empty/null/absent input';
}
$paths = [];
foreach ($request['operation_keys'] as $key) {
    $tail = explode(' ', $key, 2)[1];
    $paths[] = explode('/responses/', explode('/requestBody/', $tail, 2)[0], 2)[0];
}
$bindings = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator('request')) as $file) {
    if (!$file->isFile() || !str_ends_with($file->getFilename(), 'Request.php') || $file->getFilename() === 'AlipayRequest.php') {
        continue;
    }
    if (!array_filter($paths, fn ($p) => str_contains(file_get_contents($file->getPathname()), $p))) {
        continue;
    }
    $name = substr($file->getFilename(), 0, -4);
    $class = sdkclass($name);
    $reflection = new ReflectionClass($class);
    if ($reflection->isAbstract() || !$reflection->hasMethod('getPath')) {
        continue;
    }
    $obj = new $class();
    if (!in_array($obj->getPath(), $paths, true)) {
        continue;
    }
    $response = sdkclass(substr($name, 0, -7).'Response');
    $bindings[] = ['path' => $obj->getPath(),'method' => $obj->getHttpMethod(),'request' => $name,'response' => (new ReflectionClass($response))->getShortName()];
}
echo json_encode(['models' => $models,'bindings' => $bindings,'wire_checks' => count($models),'evidence' => $evidence], JSON_THROW_ON_ERROR);
