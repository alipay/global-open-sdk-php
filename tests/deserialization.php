<?php
// Run: php tests/deserialization.php [SDK root] [--snapshot] [--require-canonical-types]
$root = $argv[1] ?? dirname(__DIR__);
spl_autoload_register(function ($class) use ($root) {
    $parts = explode('\\', ltrim($class, '\\'));
    $dirs = ['Model' => 'model', 'Request' => 'request', 'Response' => 'response', 'Client' => 'client'];
    if (isset($dirs[$parts[0]])) {
        $parts[0] = $dirs[$parts[0]];
        $file = $root . '/' . implode('/', $parts) . '.php';
        if (is_file($file)) { require_once $file; }
    }
});
function check($ok, $message) { if (!$ok) { throw new RuntimeException($message); } }
function canonical($type) { return str_replace('\\request\\model\\', '\\Model\\', $type); }
function sample($type) {
    $type = canonical($type);
    if (substr($type, -2) === '[]') { return [sample(substr($type, 0, -2))]; }
    if (preg_match('/^(?:map\[|array<)[^,]+,(.*)[\]>]$/', $type, $m)) { return ['key' => sample(trim($m[1]))]; }
    if (in_array($type, ['bool', 'boolean'], true)) { return false; }
    if (in_array($type, ['int', 'integer', 'float', 'double', 'number'], true)) { return 0; }
    if ($type === 'string') { return 'sample'; }
    if (in_array($type, ['object', 'mixed', 'array'], true)) { return ['key' => 'value']; }
    if ($type === '\\DateTime') { return new DateTime('2026-01-01T00:00:00Z'); }
    check(class_exists($type), 'Unresolved type: ' . $type);
    $r = new ReflectionClass($type);
    return $r->isInstantiable() ? new $type() : 'FUTURE_VALUE';
}
$instances = [];
$enums = [];
foreach (['model', 'request', 'response'] as $dir) {
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/' . $dir));
    foreach ($it as $file) {
        if ($file->getExtension() !== 'php') { continue; }
        $text = file_get_contents($file->getPathname());
        if (!preg_match('/namespace\s+([^;]+);/', $text, $ns) || !preg_match('/^class\s+(\w+)/m', $text, $c)) { continue; }
        $class = trim($ns[1]) . '\\' . $c[1];
        if (!class_exists($class)) { continue; }
        if ($dir === 'model' && method_exists($class, 'getValue') && method_exists($class, '__toString')) {
            $r = new ReflectionClass($class);
            if ($r->getConstructor() !== null && $r->getConstructor()->isPrivate()) { $enums[$class] = $r->getConstants(); }
        }
        if (!is_subclass_of($class, Model\ModelInterface::class)) { continue; }
        $r = new ReflectionClass($class);
        if (!$r->isInstantiable() || ($r->getConstructor() !== null && $r->getConstructor()->getNumberOfRequiredParameters() > 0)) { continue; }
        $o = new $class();
        foreach ($class::openAPITypes() as $key => $type) {
            $setter = $class::setters()[$key] ?? null;
            if ($setter !== null) {
                $allowed = 'get' . ucfirst($key) . 'AllowableValues';
                $value = method_exists($o, $allowed) ? (substr($type, -2) === '[]' ? [$o->$allowed()[0]] : $o->$allowed()[0]) : sample($type);
                $o->$setter($value);
            }
        }
        $instances[$class] = $o;
    }
}
ksort($instances);
if (in_array('--snapshot', $argv, true)) {
    echo json_encode($instances, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT), "\n";
    exit;
}
check(count($instances) > 400, 'Model discovery unexpectedly incomplete');
foreach ($enums as $class => $values) {
    foreach (array_merge(array_values($values), ['FUTURE_VALUE']) as $value) {
        check(Model\ObjectSerializer::deserialize($value, $class) === $value, 'Enum: ' . $class);
    }
}
check(count($enums) >= 52, 'Enum discovery unexpectedly incomplete');
$count = 0;
foreach ($instances as $class => $o) {
    if (in_array('--require-canonical-types', $argv, true)) {
        foreach ($class::openAPITypes() as $type) { check(strpos($type, '\\request\\model\\') === false, 'Stale type: ' . $class); }
    }
    $json = json_encode($o, JSON_THROW_ON_ERROR);
    $copy = Model\ObjectSerializer::deserialize($json, $class);
    check(json_decode(json_encode($copy), true) === json_decode($json, true), 'Roundtrip: ' . $class);
    $count++;
}
// Legacy direct types, nested models, arrays, maps, scalar enum values, and unknown enum values.
$s = Model\ObjectSerializer::class;
$c = $s::deserialize((object)['businessAddress' => (object)['country' => 'US'], 'taxIds' => [(object)['country' => 'US', 'value' => 'id']]], '\\request\\model\\InvoiceCustomerDetails');
check($c instanceof Model\InvoiceCustomerDetails && $c->getBusinessAddress() instanceof Model\CustomerBusinessAddress, 'Nested address');
check($c->getTaxIds()[0] instanceof Model\BuyerTaxId, 'Nested array');
foreach (['map[string,\\request\\model\\Address]', 'array<string,\\request\\model\\Address>'] as $type) {
    $map = $s::deserialize((object)['home' => (object)['country' => 'US']], $type);
    check($map['home'] instanceof Model\Address, 'Map');
}
foreach (['S', 'FUTURE_VALUE'] as $value) {
    check($s::deserialize($value, '\\Model\\ResultStatusType') === $value, 'Enum scalar');
    check($s::deserialize($value, '\\request\\model\\ResultStatusType') === $value, 'Legacy enum scalar');
}
check($s::deserialize(['S', 'FUTURE_VALUE'], '\\request\\model\\ResultStatusType[]') === ['S', 'FUTURE_VALUE'], 'Enum array');
check($s::deserialize((object)['x' => 'FUTURE_VALUE'], 'map[string,\\request\\model\\ResultStatusType]') === ['x' => 'FUTURE_VALUE'], 'Enum map');
check($s::deserialize(null, '\\request\\model\\Address') === null, 'Null');
check($s::deserialize([], '\\request\\model\\Address[]') === [], 'Empty array');
$b = $s::deserialize((object)['isAccountVerified' => false, 'successfulOrderCount' => 0, 'taxIds' => []], '\\Model\\Buyer');
check($b->getIsAccountVerified() === false && $b->getSuccessfulOrderCount() === 0 && $b->getTaxIds() === [], 'False/zero/empty');
check(!array_key_exists('businessName', json_decode(json_encode(new Model\Buyer()), true)), 'Omitted field');
$enumCount = count($enums);
echo "PASS: $count model/request/response roundtrips, $enumCount enum classes; legacy names, nested objects, arrays/maps, enums, unknown values, null/false/zero/empty.\n";

require __DIR__ . '/serializer_boundaries.php';
