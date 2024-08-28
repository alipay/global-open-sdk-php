<?php
require '../init.php';

use \Model\ProductCodeType;
use \Model\Order;
use \Model\Merchant;
use \Model\Store;
use \Model\Amount;
use \Model\Env;
use \Client\DefaultAlipayClient;
use \Model\TerminalType;
use \Model\OsType;
use \Model\WalletPaymentMethodType;
use \Model\SettlementStrategy;
use \Request\pay\AlipayPayQueryRequest;
use \Request\pay\AlipayPayRequest;
use \Model\PaymentMethod;
use \Request\pay\AlipayRefundRequest;
use \Request\pay\AlipayInquiryRefundRequest;
use \Request\pay\AlipayPayCancelRequest;
use \Request\pay\AlipayPaymentSessionRequest;
use \Model\Buyer;
use \Request\pay\AlipayPayConsultRequest;
use \Model\PaymentFactor;
use \Model\PresentmentMode;



const clientId = "SANDBOX_5YBZ1G2ZHUPS06086";
const  merchantPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDvd0h55/WfbUrXfBkc0+X3H5RpD0b0T4yEVwnqUcFea7epULNstd5ItZXkV5UdkRiOqwUXGqTw2jLFbo/Qdgss+yXiUiIvB2ynncBNWNw9pCuzS+GUMw4ZARSwASPbb5hB0iK3ASl7BXOEncRuybm4gn3tD975hCGHpMeSTx0Z8rCHBqaterpyCPs68Op5kzoTYHiMCGozLeMUEand1O6OPZNQxM5c+ME+YaA6g4VbN6CjtxEihU/lhpruGN5yD+/zBRSdqrD0qxIyq3bxhTYzIXjImR4FBfqz5CoSwu7jFZdxTMyIW4lr/dXzqIvCcjrDP4R8aRB4Dy81vPTP0vnfAgMBAAECggEAIBW+az8OJP9S0M562ub1YAgmLXFzk1Z5QF4dIP01SH5sTE5YzA8OKnXSEJc/joebX7pAY1kZkn/Z36Qxtr+qPauk5s8Ub3KyNz8mvfZTBBtUE6DuJ5ozoFwJto9gi41HPEJ4jkaklSwkzzcIU8PJk5RAZRwERzBSAcetScg54PjmG424dn6fBE+0HTMtJc1l6WPzcJOm7F8X7VOpL7dZJBFQXFh/gagjz9a/WXb0BIeOyJ35PMh1Ta6ZMB1bmCRYHL/Z4JEp4OE1Wz6f20h1kLtEKr4EbN6DDylM5/f9rmpB+6THdNVuPVaKTm5g47mKDWt/XsT6qNrxAHYRpMH4qQKBgQD8bWXt4dz5Ao33Aohuv/PrLSNxnB7Q+v1fUmhza55n09jaNJOX95BzECBXHpxZxVnRnScHhPIAEjGcH8h5ahLTmbblBHzS9VivWqgDwsVFS/kS1iWLfqVAK2N1TM81X8kiwudfAN0h5SFzuiJrCqdu/X1QlBVs3hMO8MjN8u7xhQKBgQDy2uxCTs5ejC0TaY2WBcGZ+gmxLic+jOGHNqrcB2+dGyvF6yjZgeasdwG5hSO85z9KQP56Ar+JI03MUd6WJBDPs1zcd/FNN9HIFPmI4DM4RBrunr7QRq2yaKgA6k9WFh6G4EkO6DrD7A9xRNhGJgKpSOBpivdEY8yq8Ue0JcHpEwKBgBYgvOuyff1yJOG/XhhfSVGXXmEKL4VgSy+8+J0NlRBC+OJ/82RB9m6vvjYE3+3ap/oBDbfSBqjM735hJuDF1Kqp8ed3kj2n9kNA7jOOMl7VvxrQnO/yhSfv5cMVnaBvKiGa9k9Usw3SmTEc4wGBKJZJMGAM6yfk+8S2hNPQ9PNFAoGAM3tvXDsiim6C27ujlSsROJgF1/alwR/Sa3yOSeiVo6Nv6xwH49wiz2rHBdIQmmoXQ6F1kN3mRqciRe8RFZj9q1ollGMk1y6/HQA9SePlV8cwQmeKodJp3glLnC4PtXso64S+WBeo5YG0YFms02oZZFObpyQbePcDGzXc8naSndsCgYEAu35IqER+dxQNQxrgT83lzYDjtiEFTsyuyjKSvYNrhCJcgzNiGQSs55k1LEWuxNzvNuHaT3djcLINz9WrzZkShJBUZO50cTUcCjqw1C9fBGiqU7zQBvCb3rdNzAZwmEqjjjrT1dYH4gGdYc1dSc6XHwWWbduqbT91DaENxd4wIuY=";
const  alipayPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkJIL3C7NSzSQxP1DNK0Grktr5G5bMEj4ndEIBnSyFv8+e6ytS+G1+ch7EdZ4Lt7KYUGoFW1wJKyTS8V5UBMJTWxAkdc2uX3GrQiWbPvReMl3sNa3SC9Kmi8ofVKQdpAt8aZZaTLxmti0YyCh8zUTddE9AOeMZi8xvzC8chcGbfx4FA5meFGkPEBeYfxZgQzCjXnMJ/A2JFeh5g2443pfAq/caoIamcnTcA9qhJCMaqDyXb2pxXmg/VOClhqhaOjj4dnxzYKln1YNJw02SaVT9zjkNJkbY2QzCjEV0NdG/QLCQ/xBkFlDvlJ+nyCiTySqVOuJXGCos1cljMoYJGZLXQIDAQAB";
const gatewayUrl = "https://open-sea-global.alipay.com";


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
//cancel("PR_1724811957224");
//queryPay("PR_172352027421");
//refund("202408131940108001001881A0212894597");
//queryRefund("refund_1723527767056");
consult();
//createSession();