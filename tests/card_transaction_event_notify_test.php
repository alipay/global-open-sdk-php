<?php
require __DIR__ . '/../vendor/autoload.php';

use Request\notify\AlipayCardTransactionEventNotify;
use Model\Amount;
use Model\EventMerchantInfo;

function eventCheck($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function eventWithoutNulls($value)
{
    if (!is_array($value)) {
        return $value;
    }
    foreach ($value as $key => $item) {
        if ($item === null) {
            unset($value[$key]);
        } else {
            $value[$key] = eventWithoutNulls($item);
        }
    }
    return $value;
}

$fixtures = json_decode(file_get_contents(__DIR__ . '/fixtures/card-transaction-event-notify.json'), true, 512, JSON_THROW_ON_ERROR);
eventCheck(count(get_class_vars(AlipayCardTransactionEventNotify::class)) === 22, 'Expected 22 flat event fields');
foreach ($fixtures as $fixture) {
    $body = $fixture['body'];
    $notify = new AlipayCardTransactionEventNotify();
    // Existing PHP Notify DTOs use caller-owned hydration; nested objects use SDK model types.
    foreach ($body + ['futureField' => ['ignored' => true]] as $key => $value) {
        $setter = 'set' . ucfirst($key);
        if (!method_exists($notify, $setter)) {
            continue;
        }
        if ($value !== null && in_array($key, ['outAmount', 'inAmount', 'transactionAmount'], true)) {
            $value = new Amount($value);
        } elseif ($key === 'merchantInfo' && $value !== null) {
            $value = new EventMerchantInfo($value);
        }
        $notify->$setter($value);
        eventCheck($notify->{'get' . ucfirst($key)}() === $value, 'Getter mismatch: ' . $key);
    }
    $actual = json_decode(json_encode($notify, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
    eventCheck(eventWithoutNulls($actual) == eventWithoutNulls($body), 'Wire field mismatch: ' . $fixture['name']);
    eventCheck(!property_exists($notify, 'futureField'), 'Unknown field was added');
    if ($fixture['name'] === 'auth') {
        eventCheck($notify->getAuthTime() === null, 'AUTH authTime was inferred');
    }
    if ($fixture['name'] === 'capture') {
        eventCheck($notify->getOutAmount() instanceof Amount, 'Missing Amount model');
        eventCheck($notify->getOutAmount()->getValue() === '0', 'Zero outflow lost');
        eventCheck($notify->getOutAmount()->getCurrency() === 'USD', 'Billing currency lost');
        eventCheck($notify->getTransactionAmount()->getValue() === '30000', 'Capture amount changed');
        eventCheck($notify->getInAmount() === null, 'Unexpected inAmount');
        eventCheck($notify->getBalanceType() === 'ANTOM_BIZ_ACCOUNT', 'Balance type changed');
        eventCheck($notify->getAuthTime() === '2026-07-09T10:35:10+00:00', 'Timezone changed');
    }
    if ($fixture['name'] === 'refund') {
        eventCheck($notify->getInAmount()->getValue() === '99999999999999999999', '20-digit Amount changed');
        eventCheck($notify->getMerchantInfo() instanceof EventMerchantInfo, 'Missing merchant model');
    }
}
echo "Card transaction event notify: PASS (6 fixtures)\n";
