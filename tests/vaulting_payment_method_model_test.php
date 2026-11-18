<?php
require __DIR__ . '/../vendor/autoload.php';

$metadata = ['recurringType' => 'UNSCHEDULED', 'enabled' => false, 'count' => 0, 'items' => []];
$detail = new \Model\VaultingRequestPaymentMethodDetail();
$detail->setPaymentMethodType('CARD');
$detail->setPaymentMethodMetaData($metadata);
$request = new \Request\pay\AlipayVaultingPaymentMethodRequest();
$request->setPaymentMethodDetail($detail);
$encoded = json_decode(json_encode($request, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
if ($encoded['paymentMethodDetail']['paymentMethodMetaData'] !== $metadata) {
    throw new RuntimeException('Request metadata serialization changed');
}
foreach ([\Response\pay\AlipayVaultingPaymentMethodResponse::class, \Response\pay\AlipayVaultingQueryResponse::class] as $response) {
    $types = $response::openAPITypes();
    if (strcasecmp(ltrim($types['paymentMethodDetail'], '\\'), 'Model\\PaymentMethodDetail') !== 0) {
        throw new RuntimeException('Response detail type changed');
    }
}
if (method_exists(\Model\PaymentMethodDetail::class, 'getPaymentMethodMetaData')) {
    throw new RuntimeException('Request metadata leaked into responses');
}
echo "Vaulting request metadata and response model types: PASS\n";
