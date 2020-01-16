```
Language：PHP
PHP version：5.4.7+
Copyright：Ant financial services group
```

#### 1 Important note
The SDK mainly shows how to access the alipay gateway, which cannot guarantee the performance and stability.

#### 2 The demo code for create order
```
$alipayCreateOrderRequest = new AlipayCreateOrderRequest();

$clientId = "your clientId";
$path = "/ams/sandbox/api/v1/payments/create";

$productCode = ProductCodeType::CASHIER_PAYMENT;
$paymentRequestId = "demo-test-id";
$order = new Order();
$order->setOrderDescription("test order desc");
$order->setReferenceOrderId("102775745075669");
$orderAmount = new Amount();
$orderAmount->setCurrency("USD");
$orderAmount->setValue("100");
$order->setOrderAmount($orderAmount);

$paymentAmount = new Amount();
$paymentAmount->setCurrency("USD");
$paymentAmount->setValue("100");
$paymentNotifyUrl = "https://www.alipay.com/notify";
$paymentRedirectUrl = "https://www.alipay.com";

$alipayCreateOrderRequest->setClientId($clientId);
$alipayCreateOrderRequest->setPath($path);
$alipayCreateOrderRequest->setProductCode($productCode);
$alipayCreateOrderRequest->setPaymentRequestId($paymentRequestId);
$alipayCreateOrderRequest->setPaymentAmount($paymentAmount);
$alipayCreateOrderRequest->setOrder($order);
$alipayCreateOrderRequest->setPaymentNotifyUrl($paymentNotifyUrl);
$alipayCreateOrderRequest->setPaymentRedirectUrl($paymentRedirectUrl);

$merchantPrivateKey =  "your PrivateKey";
$alipayPublicKey    =  "your alipayPublicKey";

$alipayClient   = new DefaultAlipayClient("https://open-sea.alipay.com", $merchantPrivateKey, $alipayPublicKey);
$alipayResponse = $alipayClient->execute($alipayCreateOrderRequest);

```

The execute method contains the HTTP request to the gateway.

If you're concerned about HTTP invocation performance, you can implement HTTP invocation yourself.

```
class YourAlipayClient extends BaseAlipayClient{

    function __construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey) {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey);
    }

    protected function buildCustomHeader(){
        return null;
    }

    protected function sendRequest($requestUrl, $httpMethod, $headers, $reqBody){
        $httpRpcResult = new HttpRpcResult();

        // TODO
        // $httpRpcResult->setRspBody($rspBody);
        // $httpRpcResult->setRspSign($rspSign);
        // $httpRpcResult->setRspTime($rspTime);

        return $httpRpcResult;
    }

}

$yourAlipayClient  = new YourAlipayClient("https://open-sea.alipay.com", $merchantPrivateKey, $alipayPublicKey);
$alipayPayResponse = $yourAlipayClient->execute($aliPayRequest);

```

#### 3 If you don't care about HTTP calls,the sample for sign and verify
```
$signReqValue  = SignatureTool::sign($httpMethod, $path, $clientId, $reqTime, $reqBody, $merchantPrivateKey);
$isVerifyPass  = SignatureTool::verify($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue, $alipayPublicKey);

```
