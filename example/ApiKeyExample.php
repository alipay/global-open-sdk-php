<?php
// Read ANTOM_GATEWAY_URL, ANTOM_API_KEY, ANTOM_REDIRECT_URL and ANTOM_NOTIFY_URL from the environment.
// Use a TEST key with createPaymentSession permission for sandbox testing.
// This example creates a CARD session for USD 1.00; it does not complete a payment.
// Replace 127.0.0.1 with the buyer's IP. Notifications require a reachable endpoint.

require __DIR__ . '/../vendor/autoload.php';

use Client\DefaultAlipayClient;
use Model\Amount;
use Model\Order;
use Model\PaymentMethod;
use Model\PaymentFactor;
use Model\SettlementStrategy;
use Model\Env;
use Model\TerminalType;
use Model\ProductCodeType;
use Request\pay\AlipayPaymentSessionRequest;

$client = DefaultAlipayClient::fromConfig([
    'gatewayUrl' => getenv('ANTOM_GATEWAY_URL'),
    'apiKey' => getenv('ANTOM_API_KEY'),
]);
$amount = new Amount(['currency' => 'USD', 'value' => '100']);
$request = new AlipayPaymentSessionRequest();
$request->setProductCode(ProductCodeType::CASHIER_PAYMENT);
$request->setProductScene('CHECKOUT_PAYMENT');
$request->setPaymentRequestId(bin2hex(random_bytes(16)));
$request->setOrder(new Order([
    'referenceOrderId' => bin2hex(random_bytes(16)),
    'orderDescription' => 'API Key example',
    'orderAmount' => $amount,
]));
$request->setPaymentAmount($amount);
$request->setPaymentMethod(new PaymentMethod(['paymentMethodType' => 'CARD']));
$request->setPaymentFactor(new PaymentFactor(['isAuthorization' => false]));
$request->setSettlementStrategy(new SettlementStrategy(['settlementCurrency' => 'USD']));
$request->setEnv(new Env(['terminalType' => TerminalType::WEB, 'clientIp' => '127.0.0.1']));
$request->setPaymentRedirectUrl(getenv('ANTOM_REDIRECT_URL'));
$request->setPaymentNotifyUrl(getenv('ANTOM_NOTIFY_URL'));

// Transport errors propagate as exceptions; also check the business result.
$response = $client->execute($request);
$result = $response->result ?? null;
if ($result === null || ($result->resultStatus ?? '') !== 'S'
    || ($result->resultCode ?? '') !== 'SUCCESS') {
    throw new RuntimeException('Session creation was not successful: ' .
        ($result->resultCode ?? 'missing result'));
}
if (empty($response->paymentSessionId)) {
    throw new RuntimeException('Missing paymentSessionId');
}
// Use $response->paymentSessionData or the returned URL with your checkout.
echo "Payment session created\n";
