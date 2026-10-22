<?php

$config = require __DIR__ . '/environment.php';
require __DIR__ . '/../vendor/autoload.php';

use Client\DefaultAlipayClient;
use Model\Amount;
use Model\Env;
use Model\Merchant;
use Model\Order;
use Model\OsType;
use Model\PaymentMethod;
use Model\ProductCodeType;
use Model\Store;
use Model\TerminalType;
use Model\WalletPaymentMethodType;
use Request\pay\EntryCodePaymentRequest;

$clientId = $config['clientId'];

$paymentRequestId = 'PR_' . round(microtime(true) * 1000);
$order = new Order();
$order->setOrderDescription("test order desc");
$order->setReferenceOrderId("102775745075668");
$orderAmount = new Amount();
$orderAmount->setCurrency("USD");
$orderAmount->setValue("100");
$order->setOrderAmount($orderAmount);

$merchant = new Merchant();
$merchant->setReferenceMerchantId('seller2322174590001');
$merchant->setMerchantMCC('7011');
$merchant->setMerchantName('Some_Mer');

$store = new Store();
$store->setStoreMCC('7011');
$store->setReferenceStoreId('store232217459000021');
$store->setStoreName('Some_Store');

$merchant->setStore($store);

$order->setMerchant($merchant);

$env = new Env();
$env->setUserAgent('"Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15G77 NebulaSDK/1.8.100112 Nebula PSDType(1) AlipayDefined(nt:4G,ws:320|504|2.0) AliApp(AP/10.1.32.600) AlipayClient/10.1.32.600 Alipay Language/zh-Hans AlipayConnect"');
$env->setOsType(OsType::ANDROID);
$env->setTerminalType(TerminalType::WAP);
$order->setEnv($env);

$paymentAmount = new Amount();
$paymentAmount->setCurrency("USD");
$paymentAmount->setValue("100");
$paymentNotifyUrl = "https://www.alipay.com/notify";
$paymentRedirectUrl = "https://www.alipay.com";

$request = new EntryCodePaymentRequest($paymentRequestId, $order, 'USD', 9000, $paymentNotifyUrl, null);

$paymentMethod = new PaymentMethod();
$paymentMethod->setPaymentMethodType(WalletPaymentMethodType::ALIPAY_CN);
$request->setPaymentMethod($paymentMethod);

$request->validate();

$request->setClientId($clientId);

$request->setProductCode(ProductCodeType::CASHIER_PAYMENT);


$merchantPrivateKey = $config['merchantPrivateKey'];

$alipayPublicKey = $config['alipayPublicKey'];

$alipayClient = new DefaultAlipayClient($config['gatewayUrl'], $merchantPrivateKey, $alipayPublicKey);
$alipayResponse = $alipayClient->execute($request);

//print(json_encode($request));
//print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($alipayResponse));
