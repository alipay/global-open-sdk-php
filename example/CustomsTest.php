<?php
require '../init.php';

use \Request\customs\AlipayCustomsDeclareRequest;
use \Client\DefaultAlipayClient;
use \Model\Amount;
use \Model\MerchantCustomsInfo;
use \Model\CustomsInfo;
use \Model\Certificate;
use \model\UserName;
use \model\CertificateType;



const clientId = "";
const  merchantPrivateKey = "";
const  alipayPublicKey = "";
const gatewayUrl = "";


function declares($paymentId)
{

    $request = new AlipayCustomsDeclareRequest();
    $requestId = 'declare_' . round(microtime(true) * 1000);
    $request->setDeclarationRequestId($requestId);
    $request->setPaymentId($paymentId);
    $amount = new Amount();
    $amount->setValue(100);
    $amount->setCurrency("CNY");
    $request->setDeclarationAmount($amount);
    $merchantCustomsInfo = new MerchantCustomsInfo();
    $merchantCustomsInfo->setMerchantCustomsName("wafdwasfewa");
    $merchantCustomsInfo->setMerchantCustomsCode("sdfsfd");
    $request->setMerchantCustomsInfo($merchantCustomsInfo);
    $request->setSplitOrder(false);
    $customsInfo = new CustomsInfo();
    $customsInfo->setRegion("CN");
    $customsInfo->setCustomsCode("ZHENGZHOU");
    $request->setCustoms($customsInfo);
    $certificate = new Certificate();
    $certificate->setCertificateNo("12345677");
    $certificate->setCertificateType(CertificateType::ID_CARD);
    $userName = new UserName();
    $userName->setFirstName("f");
    $userName->setFullName("f");
    $certificate->setHolderName($userName);
    $request->setBuyerCertificate($certificate);

    $alipayClient = new DefaultAlipayClient(gatewayUrl, merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));
    print("\n".$requestId);

}

function inquiryDeclaration($declareRequestId)
{

    $request = new \Request\customs\AlipayCustomsQueryRequest();
    $request->setDeclarationRequestIds([$declareRequestId]);

    $alipayClient = new DefaultAlipayClient(gatewayUrl, merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));


}


declares("202407311940108001001887A0209760494");
//inquiryDeclaration();