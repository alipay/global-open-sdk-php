<?php
set_include_path(__DIR__ . '/..');

require_once 'request/AlipayRequest.php';
require_once 'request/customs/AlipayCustomsDeclareRequest.php';
require_once 'model/CustomsInfo.php';
require_once 'model/Amount.php';
require_once 'model/MerchantCustomsInfo.php';
require_once 'model/Certificate.php';
require_once 'model/CertificateType.php';
require_once 'model/UserName.php';
require_once 'DefaultAlipayClient.php';
require_once 'request/customs/AlipayCustomsQueryRequest.php';

/**
 * build your clientId
 */
$clientId = "T_385XSM502Y108602A";

$merchantPrivateKey =  file_get_contents(__DIR__ . "/../private-pkcs1.pem");

$alipayPublicKey    =  file_get_contents(__DIR__ . "/../public.pem");

/**Step1.declare a payment**/
$declarationRequestId = 'PR_' . round(microtime(true) * 1000);
$customsDeclareRequest = new AlipayCustomsDeclareRequest();
$customsDeclareRequest -> setPath("/ams/sandbox/api/v1/customs/declare");
$customsDeclareRequest -> setDeclarationRequestId($declarationRequestId);

/** you should finish a payment first to get a paymentId**/
$customsDeclareRequest -> setPaymentId("074431163998627171512600543119623332qtLEfUJdoS202112201003184959");

$customsInfo = new CustomsInfo();
$customsInfo -> setRegion("CN");
$customsInfo -> setCustomsCode("zongshu");
$customsDeclareRequest -> setCustoms($customsInfo);

$declarationAmount = new Amount();
$declarationAmount -> setValue("1");
$declarationAmount -> setCurrency("CNY");
$customsDeclareRequest -> setDeclarationAmount($declarationAmount);

$merchantCustomsInfo = new MerchantCustomsInfo();
$merchantCustomsInfo -> setMerchantCustomsCode("guangzhou_zongshu");
$merchantCustomsInfo -> setMerchantCustomsName("jwyhanguo_card11");
$customsDeclareRequest -> setMerchantCustomsInfo($merchantCustomsInfo);

$customsDeclareRequest -> setSplitOrder(false);
$customsDeclareRequest -> setSubOrderId("1111111111");

$certificate = new Certificate();
$certificate -> setCertificateNo("3412228959867522116");
$certificate -> setCertificateType(CertificateType::ID_CARD);
$userName = new UserName();
$userName -> setFirstName("李");
$userName -> setMiddleName("小");
$userName -> setLastName("二");
$userName -> setFullName("李小二");
$certificate -> setHolderName($userName);

$customsDeclareRequest -> setBuyerCertificate($certificate);

$customsDeclareRequest -> setClientId($clientId);



$alipayClient   = new DefaultAlipayClient("https://open-sea.alipay.com", $merchantPrivateKey, $alipayPublicKey);
$alipayResponse = $alipayClient->execute($customsDeclareRequest);

print(json_encode($customsDeclareRequest));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($alipayResponse));


/**Step2.declare a payment**/
$queryDeclareRequest = new AlipayCustomsQueryRequest();
$queryDeclareRequest -> setPath("/ams/sandbox/api/v1/customs/inquiryDeclarationRequests");
$queryDeclareRequest -> setClientId($clientId);

$declarationRequestIds[0] = $declarationRequestId;
$queryDeclareRequest ->setDeclarationRequestIds($declarationRequestIds);

$queryDeclareResponse = $alipayClient->execute($queryDeclareRequest);

print(json_encode($queryDeclareRequest));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($queryDeclareResponse));