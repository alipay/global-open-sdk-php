<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Client\ApiKeyAlipayClient;
use Model\Amount;
use Model\Env;
use Model\Order;
use Model\PaymentFactor;
use Model\PaymentMethod;
use Model\ProductCodeType;
use Model\SettlementStrategy;
use Model\TerminalType;
use Request\pay\AlipayPaymentSessionRequest;

function requiredEnv($name)
{
    $value = getenv($name);
    if ($value === false || trim($value) === '') {
        throw new InvalidArgumentException('Missing environment variable: ' . $name);
    }
    return $value;
}

$key = requiredEnv('ANTOM_API_KEY');
if (strpos($key, 'irak_TEST_') !== 0) {
    throw new InvalidArgumentException('This example requires a Restricted TEST key');
}
$client = new ApiKeyAlipayClient([
    'gatewayUrl' => requiredEnv('ANTOM_GATEWAY_URL'),
    'apiKey' => $key,
]);
$notifyUrl = requiredEnv('ANTOM_NOTIFY_URL');
$amount = new Amount(['currency' => 'USD', 'value' => '100']);
$request = new AlipayPaymentSessionRequest();
$request->setProductCode(ProductCodeType::CASHIER_PAYMENT);
$request->setProductScene('CHECKOUT_PAYMENT');
$request->setPaymentRequestId('example-session-' . bin2hex(random_bytes(16)));
$request->setOrder(new Order([
    'referenceOrderId' => 'example-order-' . bin2hex(random_bytes(16)),
    'orderDescription' => 'API Key sandbox example',
    'orderAmount' => $amount,
]));
$request->setPaymentAmount($amount);
$request->setPaymentMethod(new PaymentMethod(['paymentMethodType' => 'CARD']));
$request->setPaymentFactor(new PaymentFactor(['isAuthorization' => false]));
$request->setSettlementStrategy(new SettlementStrategy(['settlementCurrency' => 'USD']));
$request->setEnv(new Env(['terminalType' => TerminalType::WEB, 'clientIp' => '127.0.0.1']));
// Use a separate redirect page in a real integration.
$request->setPaymentRedirectUrl($notifyUrl);
$request->setPaymentNotifyUrl($notifyUrl);

$response = $client->execute($request);
// Local debugging only: the response contains payment-session credentials.
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
if (!isset($response->result) || $response->result->resultStatus !== 'S'
    || $response->result->resultCode !== 'SUCCESS') {
    throw new RuntimeException('createPaymentSession failed; see the response result');
}
