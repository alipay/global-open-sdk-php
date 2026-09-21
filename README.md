# Antom SDK for PHP

Latest release: **1.6.1**

## Installation

```sh
composer require antom/global-open-sdk-php
```

Requires the JSON, OpenSSL, and cURL extensions.

## Quick start

- **RSA:** follow the [configuration](#rsa-configuration) and [inline example](#payment) below.
- **API Key (limited availability):** follow the [setup guide](docs/api-key-client.md) and run the [sandbox example](example/ApiKeyPaymentSession.php).
- Browse [more examples](example) and the [API documentation](https://global.alipay.com/docs/).

RSA and API Key clients share request/response models. File uploads and notification
verification still require RSA credentials.

### RSA configuration

Before using the RSA client, prepare these values from your Antom integration:

```properties
gatewayUrl=your_regional_https_gateway
clientId=your_client_id
merchantPrivateKey=your_merchant_private_key
alipayPublicKey=your_antom_public_key
```

The examples read them from `ANTOM_GATEWAY_URL`, `ANTOM_CLIENT_ID`,
`ANTOM_MERCHANT_PRIVATE_KEY`, and `ANTOM_PUBLIC_KEY`, respectively.
Keep keys in server-side configuration. Replace sample order data and callback
URLs with your own values before sending a request.

### Payment

Save this file in your application's Composer project root.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

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

$gatewayUrl = getenv('ANTOM_GATEWAY_URL');
$clientId = getenv('ANTOM_CLIENT_ID');
$merchantPrivateKey = getenv('ANTOM_MERCHANT_PRIVATE_KEY');
$alipayPublicKey = getenv('ANTOM_PUBLIC_KEY');

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

$request->setClientId($clientId);

$request->setPaymentRequestId($paymentRequestId);

$settlementStrategy = new SettlementStrategy();
$settlementStrategy->setSettlementCurrency("USD");
$request->setSettlementStrategy($settlementStrategy);

$alipayClient = new DefaultAlipayClient($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId);
$alipayResponse = $alipayClient->execute($request);
```

### API Key client (limited availability)

> API Key access is not yet available to all merchants. Use this client only if
> API Key access has been enabled for your account; otherwise, use RSA.

Set `ANTOM_GATEWAY_URL` and `ANTOM_API_KEY` in your server environment.
This initializes the client; see the [setup guide](docs/api-key-client.md) for a
complete sandbox request and its additional configuration.

```php
require_once 'vendor/autoload.php';

$client = new \Client\ApiKeyAlipayClient([
    'gatewayUrl' => getenv('ANTOM_GATEWAY_URL'),
    'apiKey' => getenv('ANTOM_API_KEY'),
]);
```

## Upgrade notes

Gateway responses with `resultStatus S` must be signed; responses with only one
of the signature and response-time headers are rejected.

Billing integrations: `availableAmount` now uses `Amount`; the `AvailableAmount`
model has been removed.

## Meter event upload

`meter/createSession` uses the regular signed AMS transport. Use its session ID
to call `meter/uploadEvent` through `executeWithHeaders`:

The fragment below assumes an initialized RSA client, a valid session ID from
`meter/createSession`, and a populated collection of meter event batches.

```php
$request = new \Request\billing\AlipayMeterUploadEventRequest([
    'meters' => $meters,
]);
$response = $client->executeWithHeaders($request, [
    'X-Session-Id' => $sessionId,
]);
```

The SDK sends `meter/uploadEvent` to the gateway URL configured on the client,
without sandbox path rewriting, request signing, response signature verification,
or automatic retries. This API requires an HTTP/2-enabled libcurl 8.10.0 or later.

## Advanced usage

### Custom HTTP transport

This extension skeleton accepts a transport callback returning a populated
`Model\HttpRpcResult`. Preserve the original body, signature, and response-time
values so the SDK can verify the response. Use `DefaultAlipayClient` for normal usage.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

class YourAlipayClient extends \Client\BaseAlipayClient
{
    private $transport;

    public function __construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey,
                                $clientId, callable $transport)
    {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId);
        $this->transport = $transport;
    }

    protected function buildCustomHeader()
    {
        return [];
    }

    protected function sendRequest($requestUrl, $httpMethod, $headers, $reqBody)
    {
        $result = call_user_func($this->transport, $requestUrl, $httpMethod, $headers, $reqBody);
        if (!$result instanceof \Model\HttpRpcResult) {
            throw new \RuntimeException('Transport must return HttpRpcResult');
        }
        return $result;
    }
}
```

### Sign and verify without the HTTP client

After loading Composer's autoloader, use the exact transmitted path, timestamp,
body, and configured keys. The variables below come from your request/response.
Verification returns `1` on success; do not treat every nonzero value as success.

```php
$signature = \Client\SignatureTool::sign(
    $httpMethod, $path, $clientId, $requestTime, $requestBody, $merchantPrivateKey);
$verified = \Client\SignatureTool::verify(
    $httpMethod, $path, $clientId, $responseTime, $responseBody, $responseSignature, $alipayPublicKey) === 1;
```

## Support

For integration questions, contact overseas_support@service.alibaba.com.
