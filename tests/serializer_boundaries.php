<?php
// Loaded after SDK model discovery by deserialization.php; fixtures never enter SDK autoload.
namespace Model {
    class SerializerTestParent extends Amount { public const DISCRIMINATOR = 'kind'; }
    class SerializerTestChild extends SerializerTestParent {}
    class SerializerTestOrdinary extends Amount {
        public function getValue() { return parent::getValue(); }
        public function __toString() { return 'ordinary'; }
    }
    class SerializerTestPublicWrapper {
        public function getValue() { return 'ordinary'; }
        public function __toString() { return 'ordinary'; }
    }
    class SerializerTestIncompleteWrapper {
        private function __construct() {}
        public function getValue() { return 'ordinary'; }
    }
    class SerializerTestMissingDiscriminator {}
}
namespace SerializerTestExternal {
    class Wrapper {
        private function __construct() {}
        public function getValue() { return 'ordinary'; }
        public function __toString() { return 'ordinary'; }
    }
}
namespace {
    $serializer = \Model\ObjectSerializer::class;
    $parent = \Model\SerializerTestParent::class;
    $child = $serializer::deserialize((object)['kind' => 'SerializerTestChild', 'currency' => 'USD', 'value' => '100'], $parent);
    check(get_class($child) === \Model\SerializerTestChild::class, 'Discriminator selects actual Model subclass');
    check($child->getCurrency() === 'USD' && $child->getValue() === '100', 'Discriminator preserves fields');
    foreach ([null, 'SerializerTestMissing', 'Amount', 123] as $kind) {
        $data = (object)['currency' => 'USD', 'value' => '100'];
        if ($kind !== null) { $data->kind = $kind; }
        $value = $serializer::deserialize($data, $parent);
        check(get_class($value) === $parent, 'Invalid/absent discriminator stays on base model');
    }
    $ordinary = $serializer::deserialize((object)['value' => '100'], \Model\SerializerTestOrdinary::class);
    check($ordinary instanceof \Model\SerializerTestOrdinary && $ordinary->getValue() === '100', 'Model with enum-like methods remains a model');
    foreach ([\Model\SerializerTestPublicWrapper::class, \Model\SerializerTestIncompleteWrapper::class,
        \SerializerTestExternal\Wrapper::class, \Model\SerializerTestMissingDiscriminator::class] as $class) {
        $failed = false;
        try { $serializer::deserialize('FUTURE_VALUE', $class); }
        catch (\Error $e) { $failed = strpos($e->getMessage(), 'DISCRIMINATOR') !== false; }
        check($failed, 'Unsupported ordinary type must not be accepted as enum or silently default: ' . $class);
    }
    echo "PASS: discriminator dispatch/fallback and enum recognition boundaries.\n";
}
