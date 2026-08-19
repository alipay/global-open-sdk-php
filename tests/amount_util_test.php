<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Util\AmountUtil;

$vectors = json_decode(file_get_contents(__DIR__ . '/fixtures/amount-conversion-test-cases.json'), true);
if (!is_array($vectors)) {
    throw new RuntimeException('shared vectors are invalid');
}

$check = static function (array $vector, callable $call): void {
    try {
        $actual = $call();
        if (isset($vector['error'])) {
            throw new RuntimeException($vector['name'] . ' expected ' . $vector['error']);
        }
        if (isset($vector['result']) && $actual !== $vector['result']) {
            throw new RuntimeException($vector['name'] . ' result mismatch');
        }
    } catch (InvalidArgumentException $exception) {
        if (!isset($vector['error']) || strpos($exception->getMessage(), $vector['error'] . ':') !== 0) {
            throw $exception;
        }
    }
};

foreach ($vectors['toAmount'] as $vector) {
    $check($vector, static function () use ($vector) {
        return AmountUtil::toAmount($vector['amount'], $vector['currency']);
    });
}
foreach ($vectors['fromAmount'] as $vector) {
    $check($vector, static function () use ($vector) {
        return AmountUtil::fromAmount($vector['value'], $vector['currency']);
    });
}
foreach ($vectors['validate'] as $vector) {
    $check($vector, static function () use ($vector) {
        AmountUtil::validate($vector['value'], $vector['currency']);
        return null;
    });
}
foreach ($vectors['toAmount'] as $vector) {
    if (isset($vector['result'])) {
        $roundTrip = AmountUtil::toAmount(AmountUtil::fromAmount($vector['result'], $vector['currency']), $vector['currency']);
        if ($roundTrip !== $vector['result']) throw new RuntimeException($vector['name'] . ' round-trip mismatch');
    }
}
foreach ([1, 1.0, true, null, ['1']] as $invalid) {
    try {
        AmountUtil::toAmount($invalid, 'USD');
        throw new RuntimeException('non-string amount was accepted');
    } catch (InvalidArgumentException $exception) {
        if (strpos($exception->getMessage(), 'INVALID_ARGUMENT_TYPE:') !== 0) throw $exception;
    }
}

echo "AmountUtil shared vectors passed\n";
