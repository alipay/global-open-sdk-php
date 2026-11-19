<?php

$root = getcwd();
spl_autoload_register(function ($name) use ($root) {
    $paths = ['Model' => 'model','Request' => 'request','Response' => 'response','Util' => 'util','Client' => 'client'];
    $parts = explode('\\', ltrim($name, '\\'));
    $base = array_shift($parts);
    if (isset($paths[$base])) {
        $file = $root . '/' . $paths[$base] . '/' . implode('/', $parts) . '.php';
        if (is_file($file)) {
            require_once $file;
        }
    }
});
require_once $root . '/ObjectSerializer.php';
function shp($t)
{
    $t = ltrim($t, '\\');
    if (str_ends_with($t, '[]')) {
        return ['type' => 'array','items' => shp(substr($t, 0, -2))];
    }
    if (preg_match('/^array<[^,]+,(.+)>$/', $t, $m)) {
        return ['type' => 'object','additionalProperties' => shp($m[1]),'properties' => (object) []];
    }
    if (in_array($t, ['string','\\DateTime','DateTime'])) {
        return ['type' => 'string'];
    }
    if (in_array($t, ['int','integer','int32','int64'])) {
        return ['type' => 'integer'];
    }
    if (in_array($t, ['float','double','number'])) {
        return ['type' => 'number'];
    }
    if (in_array($t, ['bool','boolean'])) {
        return ['type' => 'boolean'];
    }
    if (in_array($t, ['object','mixed'])) {
        return (object) [];
    }
    return ['$ref' => '#/components/schemas/' . basename(str_replace('\\', '/', $t))];
}
function val($t, $depth = 0)
{
    if ($depth > 8) {
        return null;
    }$s = shp($t);
    if (isset($s['$ref'])) {
        $c = ltrim($t, '\\');
        if (method_exists($c, 'getAllowableEnumValues')) {
            return $c::getAllowableEnumValues()[0];
        }$v = new $c();
        if (!array_key_exists(basename(str_replace('\\', '/', $c)), $GLOBALS['input']['classes'])) {
            return $v;
        }foreach ($c::openAPITypes() as $p => $ty) {
            $set = $c::setters()[$p];
            $enum = 'get' . ucfirst($p) . 'AllowableValues';
            $sample = method_exists($c, $enum) ? $v->$enum()[0] : val($ty, $depth + 1);
            $v->$set($sample);
        }return $v;
    }
    switch ($s['type'] ?? '') {
        case 'string':return 'USD';
        case 'integer':return 0;
        case 'number':return 0.0;
        case 'boolean':return false;
        case 'array':return str_ends_with($t, 'string[]') ? ['HKD','USD'] : [val(substr($t, 0, -2), $depth + 1)];
        case 'object':return ['key' => 'value'];
        default:return null;
    }
}
$input = json_decode(stream_get_contents(STDIN), true);
$out = ['models' => [],'bindings' => [],'evidence' => ['live openAPITypes/attributeMap/getters; ObjectSerializer typed parse and jsonSerialize roundtrip']];
foreach ($input['classes'] as $name => $class) {
    $types = $class::openAPITypes();
    $props = [];
    $v = new $class();
    foreach ($types as $p => $t) {
        $key = $class::attributeMap()[$p];
        $props[$key] = shp($t);
        $setter = $class::setters()[$p];
        $enum = 'get' . ucfirst($p) . 'AllowableValues';
        $sample = method_exists($class, $enum) ? $v->$enum()[0] : val($t);
        $v->$setter($sample);
    }
    $encoded = json_encode($v, JSON_THROW_ON_ERROR);
    $wire = json_decode($encoded, true);
    foreach ($props as $k => $s) {
        if (!array_key_exists($k, $wire)) {
            throw new Exception('Serializer dropped ' . $name . '.' . $k);
        }
    }
    $parsed = \Model\ObjectSerializer::deserialize(json_decode($encoded), $class);
    $again = json_decode(json_encode($parsed, JSON_THROW_ON_ERROR), true);
    if ($wire != $again) {
        throw new Exception('roundtrip ' . $name);
    }
    if (str_ends_with($name, 'PaymentPreference')) {
        foreach ([['HKD','USD'],['USD','HKD'],[]] as $currencies) {
            $policy = new $class();
            $policy->setCurrencyOrder($currencies);
            $decoded = \Model\ObjectSerializer::deserialize(json_decode(json_encode($policy, JSON_THROW_ON_ERROR)), $class);
            if ($decoded->getCurrencyOrder() !== $currencies) {
                throw new Exception('ordered/empty list lost ' . $name);
            }
        }
    }
    $out['models'][$name] = ['type' => 'object','properties' => (object) $props];
    if (str_starts_with($name, 'Alipay') && str_ends_with($name, 'Request')) {
        $operation = lcfirst(substr($name, 6, -7));
        $out['bindings'][$operation] = ['path' => $v->getPath(),'request' => $name,'response' => substr($name, 0, -7) . 'Response'];
    }
}
echo json_encode($out, JSON_THROW_ON_ERROR);
