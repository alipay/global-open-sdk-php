<?php
set_include_path(__DIR__ . '/..');

require_once 'request/pay/EntryCodePaymentRequest.php';
require_once 'model/ProductCodeType.php';
require_once 'model/Order.php';
require_once 'model/Merchant.php';
require_once 'model/Store.php';
require_once 'model/Amount.php';
require_once 'model/Env.php';
require_once 'DefaultAlipayClient.php';


$clientId = "T_385XSM502Y108602A";

$paymentRequestId = 'PR_' . round(microtime(true) * 1000);
$order = new Order();
$order->setOrderDescription("test order desc");
$order->setReferenceOrderId("102775745075669");
$orderAmount = new Amount();
$orderAmount->setCurrency("USD");
$orderAmount->setValue("100");
$order->setOrderAmount($orderAmount);

$merchant = new Merchant();
$merchant->setReferenceMerchantId('seller2322174590000');
$merchant->setMerchantMCC('7011');
$merchant->setMerchantName('Some_Mer');

$store = new Store();
$store->setStoreMCC('7011');
$store->setReferenceStoreId('store232217459000011');
$store->setStoreName('Some_Store');

$merchant->setStore($store);

$order->setMerchant($merchant);

$env = new Env();
$env->setUserAgent('"Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15G77 NebulaSDK/1.8.100112 Nebula PSDType(1) AlipayDefined(nt:4G,ws:320|504|2.0) AliApp(AP/10.1.32.600) AlipayClient/10.1.32.600 Alipay Language/zh-Hans AlipayConnect"');

$order->setEnv($env);

$paymentAmount = new Amount();
$paymentAmount->setCurrency("USD");
$paymentAmount->setValue("100");
$paymentNotifyUrl = "https://www.alipay.com/notify";
$paymentRedirectUrl = "https://www.alipay.com";

$request = new EntryCodePaymentRequest($paymentRequestId, $order, 'USD', 9000, $paymentNotifyUrl, null);

$request->validate();

$request->setClientId($clientId);

$merchantPrivateKey =  file_get_contents(__DIR__ . "/../private-pkcs1.pem");

$alipayPublicKey    =  file_get_contents(__DIR__ . "/../public.pem");

$alipayClient   = new DefaultAlipayClient("https://open-na.alipay.com", $merchantPrivateKey, $alipayPublicKey);
$alipayResponse = $alipayClient->execute($request);

print(json_encode($request));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($alipayResponse));


