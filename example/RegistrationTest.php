<?php
require '../init.php';

use Client\DefaultAlipayClient;
use Model\Address;
use Model\Attachment;
use Model\ContactInfo;
use Model\Logo;
use Model\MerchantRegistrationInfo;
use Model\ProductCodeType;
use Model\RegistrationDetail;
use Model\WebSite;
use Request\merchant\AlipayMerchantRegistrationInfoQueryRequest;
use Request\merchant\AlipayMerchantRegistrationRequest;
use Request\merchant\AlipayMerchantRegistrationStatusQueryRequest;


$merchantPrivateKey = file_get_contents(__DIR__ . "/../private-pkcs1.pem");

$alipayPublicKey = file_get_contents(__DIR__ . "/../public.pem");
$alipayClient = new DefaultAlipayClient("https://open-na.alipay.com", $merchantPrivateKey, $alipayPublicKey);
/**
 * build your clientId
 */
$clientId = "T_385XSM502Y108602A";
/**
 * build your requestId
 */
$registrationRequestId = "";
/**
 * build your merchantId
 */
$referenceMerchantId = "";
/**
 * step1.register merchant
 */
$merchantRegistrationRequest = new AlipayMerchantRegistrationRequest();
$merchantRegistrationRequest->setPath("/ams/sandbox/api/v1/merchants/registration");
$merchantRegistrationRequest->setClientId($clientId);

$merchant = new MerchantRegistrationInfo();
$merchant->setMerchantMCC("merchantMCC");
$merchant->setReferenceMerchantId($referenceMerchantId);
$logo = new Logo();
$logo->setLogoName("logoName");
$logo->setLogoUrl("https://www.logo.com");
$merchant->setLogo($logo);
$address = new Address();
$address->setAddress1("38 Leighton Road, ****");
$address->setAddress2("40 Leighton Road, ****");
$address->setCity("hong kong");
$address->setLabel("label");
$address->setRegion("HK");
$address->setState("HK");
$address->setZipCode("zipCode");
$merchant->setMerchantAddress($address);
$merchant->setMerchantDisplayName("Same_mer");
$detail = new RegistrationDetail();
$attachment1 = new Attachment();
$attachment1->setAttachmentName("attachmentName1");
$attachment1->setAttachmentType("ARTICLES_OF_ASSOCIATION");
$attachment1->setFile("testFile");
$attachment2 = new Attachment();
$attachment2->setAttachmentName("attachmentName2");
$attachment2->setAttachmentType("ARTICLES_OF_ASSOCIATION");
$attachment2->setFile("testFile");
$attachments[0] = $attachment1;
$attachments[1] = $attachment2;
$detail->setAttachments($attachments);

$detail->setBusinessType("ENTERPRISE");
$contactInfo = new ContactInfo();
$contactInfo->setContactNo("contactNo123");
$contactInfo->setContactType("MOBILE_PHONE");
$contactInfos[0] = $contactInfo;
$detail->setContactInfo($contactInfos);
$detail->setLegalName("Example Legal Name");

$registrationAddress = new Address();
$registrationAddress->setRegion("HK");

$detail->setRegistrationAddress($registrationAddress);
$detail->setRegistrationEffectiveDate("2020-01-01T12:08:55+08:00");
$detail->setRegistrationExpireDate("2020-01-01T12:08:55+08:00");
$detail->setRegistrationNo("registration*****");
$detail->setRegistrationType("ENTERPRISE_REGISTRATION_NO");

$merchant->setRegistrationDetail($detail);
$website = new WebSite();
$website->setDesc("this is webSite desc");
$website->setName("webName");
$website->setUrl("http://www.webSite.com");
$websites[0] = $website;
$merchant->setWebsites($websites);


$merchantRegistrationRequest->setMerchantInfo($merchant);
$merchantRegistrationRequest->setPassThroughInfo("{\"extraInfo\":\"extra\"}");
$productCodes[0] = ProductCodeType::CASHIER_PAYMENT;
$merchantRegistrationRequest->setProductCodes($productCodes);
$merchantRegistrationRequest->setRegistrationNotifyURL("https://merchant/example");
$merchantRegistrationRequest->setRegistrationRequestId($registrationRequestId);


$registrationResponse = $alipayClient->execute($merchantRegistrationRequest);

print(json_encode($merchantRegistrationRequest));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($registrationResponse));

/**
 *  step.2 query registration status
 */

$registrationStatusQueryRequest = new AlipayMerchantRegistrationStatusQueryRequest();
$registrationStatusQueryRequest->setClientId($clientId);
$registrationStatusQueryRequest->setPath("/ams/sandbox/api/v1/merchants/inquiryRegistrationStatus");
$registrationStatusQueryRequest->setRegistrationRequestId($registrationRequestId);
$registrationStatusResponse = $alipayClient->execute($registrationStatusQueryRequest);

print(json_encode($registrationStatusQueryRequest));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($registrationStatusResponse));

/**
 * step3.query merchant registrationInfo
 */
$registrationInfoQueryRequest = new AlipayMerchantRegistrationInfoQueryRequest();
$registrationInfoQueryRequest->setClientId($clientId);
$registrationInfoQueryRequest->setPath("/ams/sandbox/api/v1/merchants/inquiryRegistrationInfo");
$registrationInfoQueryRequest->setReferenceMerchantId($referenceMerchantId);

$registrationInfoResponse = $alipayClient->execute($registrationInfoQueryRequest);

print(json_encode($registrationInfoQueryRequest));
print('<br>-----------------------------------------------------------------------------<br>');
print(json_encode($registrationInfoResponse));
