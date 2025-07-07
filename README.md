```
Language：PHP
PHP version：5.6.40+
Releass ^1.4.6
Copyright：Ant financial services group
```

### Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require antom/global-open-sdk-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

### Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/alipay/global-open-sdk-php/releases). Then, to use the bindings, include the `init.php` file.

```php
require_once '/path/to/global-open-sdk-php/init.php';
```


#### 1 Important note
The SDK mainly shows how to access the alipay gateway, which cannot guarantee the performance and stability.

#### 2 The demo code for create payment
```
    use Request\pay\AlipayPayRequest;
    use Client\DefaultAlipayClient;
    use Model\Amount;
    use Model\Buyer;    
    use Model\Env;
    use Model\Merchant;
    use Model\Order;
    use Model\OsType;
    use Model\PaymentFactor;
    use Model\PaymentMethod;
    use Model\PresentmentMode;
    use Model\ProductCodeType;
    use Model\SettlementStrategy;
    use Model\Store;
    use Model\TerminalType;
    use Model\WalletPaymentMethodType;
    
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

    $settlementStrategy = new SettlementStrategy();
    $settlementStrategy->setSettlementCurrency("USD");
    $request->setSettlementStrategy($settlementStrategy);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey);
    $alipayResponse = $alipayClient->execute($request);
```

The execute method contains the HTTP request to the gateway.

If you're concerned about HTTP invocation performance, you can implement HTTP invocation yourself.

```
class YourAlipayClient extends  \Client\BaseAlipayClient{

     function __construct()
    {
        $a = func_get_args();
        $i = func_num_args() - 2;
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    function __construct1($gatewayUrl, $merchantPrivateKey, $alipayPublicKey)
    {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey);
    }

    function __construct2($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId)
    {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId);
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
