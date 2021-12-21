<?php
set_include_path(__DIR__ . '/..');

require_once 'request/pay/AlipayPayRequest.php';
require_once 'model/ProductCodeType.php';
require_once 'model/InStorePaymentScenario.php';
require_once 'model/Order.php';
require_once 'model/PaymentFactor.php';
require_once 'model/Amount.php';
require_once 'model/Merchant.php';
require_once 'model/Store.php';
require_once 'model/PaymentMethod.php';
require_once 'model/Env.php';
require_once 'model/TerminalType.php';
require_once 'DefaultAlipayClient.php';
require_once 'model/MerchantType.php';


$clientId = "SANDBOX_5J5Y0B2NSG534G02522";

$paymentRequestId = 'PR_' . round(microtime(true) * 1000);
$alipayPayRequest = new AlipayPayRequest();
$alipayPayRequest -> setPath("/ams/sandbox/api/v1/payments/pay");
$alipayPayRequest -> setPaymentRequestId($paymentRequestId);
$alipayPayRequest -> setProductCode(ProductCodeType::IN_STORE_PAYMENT);

$paymentFactor = new PaymentFactor();
$paymentFactor -> setInStorePaymentScenario(InStorePaymentScenario::OrderCode);

$order = new Order();
$order -> setReferenceOrderId("10277574507XXXX");
$order -> setOrderDescription("Mi Band 3 Wrist Strap Metal Screwless Stainless Steel For Xiaomi Mi Band 3 ");
$orderAmount = new Amount();
$orderAmount -> setCurrency("CNY");
$orderAmount -> setValue("1000");
$order -> setOrderAmount($orderAmount);
$order -> setExtendInfo("{\"chinaExtraTransInfo\":{\"businessType\":\"5\", \"otherBusinessType\":\"5\"}}");

$merchant = new Merchant();
$merchant -> setReferenceMerchantId("seller231117459@login.com");
$merchant -> setMerchantName("MER_FAIL");
$merchant -> setMerchantMCC("merchantMCC");
$merchant -> setMerchantType(MerchantType::INDIVIDUAL);
$store = new Store();
$store -> setReferenceStoreId("S000000XXXX");
$store -> setStoreName("storeName");
$store -> setStoreMCC("storeMCC");
$merchant -> setStore($store);
$order -> setMerchant($merchant);
$env = new Env();
$env -> setTerminalType(TerminalType::WEB);
$order -> setEnv($env);

$alipayPayRequest -> setPaymentFactor($paymentFactor);
//$alipayPayRequest -> setExtendInfo();
//$alipayPayRequest -> setMerchant();
$alipayPayRequest -> setOrder($order);
$alipayPayRequest -> setPaymentAmount($orderAmount);
//$alipayPayRequest -> setPaymentExpiryTime();
$paymentMethod = new PaymentMethod();
$paymentMethod -> setPaymentMethodType("ALIPAY_CN");
$alipayPayRequest -> setPaymentMethod($paymentMethod);
$alipayPayRequest -> setPaymentNotifyUrl("http://xmock.inc.alipay.net/api/Ipay/globalSite/automtion/paymentNotify.htm");
$alipayPayRequest -> setPaymentRedirectUrl("https://www.gcash.com?param1=sl");


$alipayPayRequest->setClientId($clientId);

//$merchantPrivateKey =  file_get_contents(__DIR__ . "/../private-pkcs1.pem");
$merchantPrivateKey =  "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCi5qPVX5vMqXgZvUup3RwRRwnWz1fs2eo209yo4N/G66xLdD0alqQ3Jzc5rL7GeDt9pNJ7OyYUw4XvYAq/88uTK/FlrBXWFzCSeN9NLB5ZbDGabxMMnaCpIi0qZspC50Bqxwwdpwks59r+DX3K4QBRQuNzlmyJsPvs8nYWY/wD3E+aRE0me7uFr9UE44sJ1nNevKwf0YFOd4IO907HiS2frfi2KaCq/R2lK8i3jUiIMPkxrZ4yvYwDPW9WI2G9gKxa4LtbvWjDiD9Rv0R05wsl3o38FoBGdjYQlJ9Gq6r16fOBuiAN97k2anU0YufoWeQKA5iOf4KDrbOP3fEDeCVzAgMBAAECggEAEvr0k+Pz70C/saAQtNYCczDnwJOgFwS8+W5uA29QI4lKJfCBPhvXPmXfVWT/RXi01crii2E06q5taJq0JfFuAtPX6JTIZo2FJ0vWGNPPJXQpw2i1u36SPaKxyIL5hhoTs11F2B6iPw00wu0nfwAAXXeBsPIR62knsU/+2lUEBB7zOiW+Xmr7ObpVLIvOXxgjIbBZci6qLQfPfcKbaWV5VCxWRUjJTswnIfvNHIoOLkQN7AW5v62EAhbJcIi1tNgUHc4Vvl/3pOvFdGpzAifJHa1qkUiEuRjpgltPAquAvWGPYZAESN902Fa5qiYxIUhVI2ofhnpT7MCbPrQIaTr6IQKBgQDs7giGo9shxFhMDv7AQe0Fw8HFBd4Vf9VsvzMpdlMax1IAy2J0BWp5h+/4msMkVMZMoulRQQO8Z6BuQbopq9RPkhP1O69R24GNTDqHJSrY27PcO2U7QQcKKvXDpp76HNojWXh85F1OSBt7trFl0HkL9rm7p64Tr/YcdqClnljCPwKBgQCwAzufv93Ud81QI5bqVOcS5DeLsXtjXnUkRz9Yiz9ejq5+O4nv6aXAvYVUukC665juzSLIZ6A1RSh8V4YcH7Gxvd0mQrrg97xSzZnyZTtZZfma3Wu82pnczS/Go5YH2ae5hgN8guxuJ/yRqsGf4ab3D7FKcUhvQpn0MDHs8fMnzQKBgHyqsynFRiR6X8uFiF45UjJaUrcM41KEtRRHdvA2JnxMrMVmPyO1RdU0xfwV0uBnCwCAKCxs/T5BeJULWJ1coJZN0tqS0SlNStnCZnl+ARGiaP1U82s+SCn9eNu97KDGVbGL/m4Y60+peWybMLTWARtec1ReYqZRTDql4NnEfAeZAoGAHpAxJkg2yNIUwLmtVvtvNISUcJldB6A7TxVgFov3cP/tpNXJ2fMEaTd/k3rUCqEmaTENvSbhVt6vbQf1raSDQo3pfN9RfAcImIhDFygk6h0e/pk8QArldMXcae21+5771OdEa7aAP5CJ9vFjtdOFHpmG+5o4Lbmu6gwEX1SUGHECgYBrWnvCEF8hcAewcbfmeBhfsBMTDbif/q3Bda0VeA2ufS2LEsuOCk7HN37vXjWuqVRfhPoIGGcLkw8J0GjUxmTkZV/yQK01ZE0ncO2cDeNSPcJzp/FQYlmO/Ujm7o9T1FYR9Lzi1TymEloy6V5MQJA2i4febQJo5HG1N3jwS0ItPQ==";

//$alipayPublicKey    =  file_get_contents(__DIR__ . "/../public.pem");
$alipayPublicKey    =  "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhDfPw3i9zsGjl/hv25/MELj0q7zA1mXj8cF9tGWMY37JpU1D5qi+0LqYSsxf/oJg53y4k9enF6jPmnICYbZ+gZCGVPd5wl/N5+FgdIntioPu6eVuGL5TJRnuHNDl5ooDtpuTyvfA+zN2wauRPyEAbN0NN5sz3/XmTv0GfW1v4Fa7sHVLP4HT14xU/w3R8FHwxv+vtC/xbs7axLAzmMlwS9pgxWF4vIQJeHWW9IJz32wYZ1EePpUF92D14wEv/dmwwt7adEsQn0NLYlbG9bZLYkvvgjXMpt1oAKvO26UrYop41licCR403hCi+ytYMvORHBvB62STS1m8ivDySqCbywIDAQAB";

$alipayClient   = new DefaultAlipayClient("http://iopengw-1851.sggz00b.dev.alipay.net", $merchantPrivateKey, $alipayPublicKey);
$alipayResponse = $alipayClient->execute($alipayPayRequest);

print(json_encode($alipayPayRequest));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($alipayResponse));