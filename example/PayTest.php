<?php
set_include_path(__DIR__ . '/..');

require_once 'model/ProductCodeType.php';
require_once 'model/Order.php';
require_once 'model/Merchant.php';
require_once 'model/Store.php';
require_once 'model/Amount.php';
require_once 'model/Env.php';
require_once 'DefaultAlipayClient.php';
require_once 'model/TerminalType.php';
require_once 'model/OsType.php';
require_once 'model/WalletPaymentMethodType.php';
require_once 'model/SettlementStrategy.php';
require_once 'request/pay/AlipayPayQueryRequest.php';
require_once 'request/pay/AlipayPayRequest.php';
require_once 'model/PaymentMethod.php';
require_once 'request/pay/AlipayRefundRequest.php';
require_once 'request/pay/AlipayInquiryRefundRequest.php';
require_once 'request/pay/AlipayPayCancelRequest.php';
require_once 'request/pay/AlipayPaymentSessionRequest.php';
require_once 'model/Buyer.php';
require_once 'request/pay/AlipayPayConsultRequest.php';
require_once 'model/PaymentFactor.php';
require_once 'model/PresentmentMode.php';



const clientId = "";
const  merchantPrivateKey = "";
const  alipayPublicKey = "";


function pay()
{
    $request = new AlipayPayRequest();

    $paymentRequestId = 'PR_' . round(microtime(true) * 1000);
    $order = new Order();
    $order->setOrderDescription("test order desc");
    $order->setReferenceOrderId("102775745075668");
    $orderAmount = new Amount();
    $orderAmount->setCurrency("HKD");
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
    $env->setTerminalType(TerminalType::WEB);
    $order->setEnv($env);

    $request->setOrder($order);

    $paymentAmount = new Amount();
    $paymentAmount->setCurrency("HKD");
    $paymentAmount->setValue("100");
    $request->setPaymentAmount($paymentAmount);

    $paymentNotifyUrl = "https://www.alipay.com/notify";
    $paymentRedirectUrl = "https://www.alipay.com";

    $request->setPaymentNotifyUrl($paymentNotifyUrl);
    $request->setPaymentRedirectUrl($paymentRedirectUrl);

    $paymentMethod = new PaymentMethod();
    $paymentMethod->setPaymentMethodType(WalletPaymentMethodType::ALIPAY_HK);
    $request->setPaymentMethod($paymentMethod);

    $request->setProductCode(ProductCodeType::CASHIER_PAYMENT);

    $request->setClientId(clientId);

    $request->setPaymentRequestId($paymentRequestId);

//$request->setPath("/ams/api/v1/payments/pay");

    $settlementStrategy = new SettlementStrategy();
    $settlementStrategy->setSettlementCurrency("USD");
    $request->setSettlementStrategy($settlementStrategy);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));
    print("\n" . $paymentRequestId);
}

function queryPay($paymentRequestId)
{
    $request = new AlipayPayQueryRequest();
    $request->setPaymentRequestId($paymentRequestId);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));

}

function refund($paymentId)
{
    $request = new AlipayRefundRequest();
    $refundRequestId = "refund_" . round(microtime(true) * 1000);
    $request->setRefundRequestId($refundRequestId);
    $request->setPaymentId($paymentId);
    $amount = new Amount();
    $amount->setCurrency("HKD");
    $amount->setValue("100");
    $request->setRefundAmount($amount);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
    print("\n" . $refundRequestId);


}

function queryRefund($refundRequestId)
{
    $request = new AlipayInquiryRefundRequest();
    $request->setRefundRequestId($refundRequestId);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
}

function cancel($paymentRequestId)
{
    $request = new AlipayPayCancelRequest();
    $request->setPaymentRequestId($paymentRequestId);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
}

function createSession()
{
    $request = new AlipayPaymentSessionRequest();
    $paymentRequestId = 'PR_' . round(microtime(true) * 1000);
    $order = new Order();
    $order->setOrderDescription("test order desc");
    $order->setReferenceOrderId(round(microtime(true) * 1000));
    $buyer = new Buyer();
    $buyer->setReferenceBuyerId("buyer_" . round(microtime(true) * 1000));
    $order->setBuyer($buyer);
    $request->setOrder($order);

    $paymentAmount = new Amount();
    $paymentAmount->setCurrency("SGD");
    $paymentAmount->setValue("4200");
    $request->setPaymentAmount($paymentAmount);

    $paymentNotifyUrl = "https://www.alipay.com/notify";
    $paymentRedirectUrl = "https://www.alipay.com";

    $request->setPaymentNotifyUrl($paymentNotifyUrl);
    $request->setPaymentRedirectUrl($paymentRedirectUrl);

    $paymentMethod = new PaymentMethod();
    $paymentMethod->setPaymentMethodType(WalletPaymentMethodType::SHOPEEPAY_SG);
    $request->setPaymentMethod($paymentMethod);

    $request->setProductCode(ProductCodeType::CASHIER_PAYMENT);

    $request->setClientId(clientId);

    $request->setPaymentRequestId($paymentRequestId);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));
    print("\n" . $paymentRequestId);

}

function consult()
{
    $request = new AlipayPayConsultRequest();
    $settlementStrategy = new SettlementStrategy();
    $settlementStrategy->setSettlementCurrency("USD");
    $request->setSettlementStrategy($settlementStrategy);
    $request->setProductCode(ProductCodeType::CASHIER_PAYMENT);
    $request->setUserRegion("SG");
    $request->setAllowedPaymentMethodRegions(["SG", "HK", "CN"]);
    $env = new Env();
    $env->setOsType(OsType::IOS);
    $env->setTerminalType(TerminalType::APP);
    $request->setEnv($env);
    $amount = new Amount();
    $amount->setCurrency("USD");
    $amount->setValue("1000");
    $request->setPaymentAmount($amount);
    $paymentFactor = new PaymentFactor();
    $paymentFactor->setPresentmentMode(PresentmentMode::BUNDLE);
    $request->setPaymentFactor($paymentFactor);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
}

//pay();
//cancel("PR_172352027421");
//queryPay("PR_172352027421");
//refund("202408131940108001001881A0212894597");
//queryRefund("refund_1723527767056");
//consult();
//createSession();