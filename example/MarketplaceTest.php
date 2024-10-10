<?php
require '../init.php';

use Request\marketplace\AlipayRegisterRequest;
use Client\DefaultAlipayClient;

const clientId = "";
const merchantPrivateKey = "";
const alipayPublicKey = "";
const gatewayUrl = "";

function register()
{
    $alipayRegisterRequest = new AlipayRegisterRequest();
    $alipayRegisterRequest->setRegistrationRequestId('register_' . round(microtime(true) * 1000));

    $settlementInfo = new \Model\SettlementInfo();
    $settlementInfo->setSettlementCurrency("BRL");
    $settlementBankAccount = new \Model\SettlementBankAccount();
    $settlementBankAccount->setBranchCode("1231");
    $settlementBankAccount->setRoutingNumber("12");
    $settlementBankAccount->setBankRegion("BR");
    $settlementBankAccount->setAccountType(\Model\AccountType::CHECKING);
    $settlementBankAccount->setAccountHolderTIN("12345678901");
    $settlementBankAccount->setAccountHolderName("Timi");
    $settlementBankAccount->setBankAccountNo("121232141");
    $settlementBankAccount->setAccountHolderType(\Model\AccountHolderType::ENTERPRISE);
    $settlementInfo->setSettlementBankAccount($settlementBankAccount);
    $alipayRegisterRequest->setSettlementInfos([$settlementInfo]);


    $merchantInfo = new \Model\MerchantInfo();
    $merchantInfo->setLoginId( round(microtime(true) * 1000)."wangzunj3ao.wzj@digital-engine.com");
    $merchantInfo->setLegalEntityType(\Model\LegalEntityType::COMPANY);


    $company = new \Model\Company();
    $company->setLegalName("legalName");
    $address = new \Model\Address();
    $address->setRegion("BR");
    $company->setRegisteredAddress($address);
    $company->setCompanyType(\Model\CompanyType::LTDA);
    $address1 = new \Model\Address();
    $address1->setRegion("BR");
    $address1->setAddress1("address1");
    $company->setOperatingAddress($address1);

    $attachment = new \Model\Attachment();
    $attachment->setAttachmentName("1.jpg");
    $attachment->setFileKey("test");
    $attachment->setAttachmentType(\Model\AttachmentType::ARTICLES_OF_ASSOCIATION);
    $attachment1 = new \Model\Attachment();
    $attachment1->setFileKey("23423tewgusdhghdsiughsud");
    $attachment1->setAttachmentType(\Model\AttachmentType::ASSOCIATION_ARTICLE);
    $attachment1->setAttachmentName("2.jpg");
    $company->setAttachments([$attachment]);
    $company->setOperatingAddress($address);

    $certificate = new \Model\Certificate();
    $certificate->setCertificateNo("11321421");
    $certificate->setCertificateType(\Model\CertificateType::ENTERPRISE_REGISTRATION);
    $company->setCertificates($certificate);

    $merchantInfo->setCompany($company);
    $merchantInfo->setReferenceMerchantId(round(microtime(true) * 1000));

    $businessInfo = new \Model\BusinessInfo();
    $businessInfo->setDoingBusinessAs("businessName_DBA");
    $webSite = new \Model\WebSite();
    $webSite->setUrl("www.alipay.com");
    $businessInfo->setWebsites([$webSite]);
    $merchantInfo->setBusinessInfo($businessInfo);

    $entityAssociations = new \Model\EntityAssociations();
    $individual = new \Model\Individual();
    $certificate1 = new \Model\Certificate();
    $certificate1->setCertificateNo("11124321421");
    $certificate1->setCertificateType(\Model\CertificateType::CPF);
    $individual->setCertificates([$certificate1]);
    $userName = new \Model\UserName();
    $userName->setFirstName("firstName");
    $userName->setMiddleName("middleName");
    $userName->setLastName("lastName");
    $userName->setFullName("fullName");
    $individual->setName($userName);
    $individual->setDateOfBirth("1990-01-01");
    $entityAssociations->setIndividual($individual);
    $entityAssociations->setLegalEntityType(\Model\LegalEntityType::INDIVIDUAL);
    $entityAssociations->setAssociationType(\Model\AssociationType::LEGAL_REPRESENTATIVE);


    $entityAssociations1 = new \Model\EntityAssociations();
    $individual1 = new \Model\Individual();
    $certificate2 = new \Model\Certificate();
    $certificate2->setFileKeys(["wetrewqratewtewgewgewg"]);
    $certificate2->setCertificateNo("11321421");
    $certificate2->setCertificateType(\Model\CertificateType::CPF);
    $individual1->setCertificates([$certificate2]);
    $individual1->setName($userName);
    $individual1->setDateOfBirth("1990-01-01");
    $entityAssociations1->setIndividual($individual1);
    $entityAssociations1->setLegalEntityType(\Model\LegalEntityType::INDIVIDUAL);
    $entityAssociations1->setAssociationType(\Model\AssociationType::UBO);


    $merchantInfo->setEntityAssociations([$entityAssociations,$entityAssociations1]);

    $alipayRegisterRequest->setMerchantInfo($merchantInfo);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipayRegisterRequest);

    printf($alipayRegisterRequest->getMerchantInfo()->getReferenceMerchantId());
    echo json_encode($alipayResponse);

}

function update($referenceMerchantId)
{
    $alipaySettlementInfoUpdateRequest = new \Request\marketplace\AlipaySettlementInfoUpdateRequest();
    $alipaySettlementInfoUpdateRequest->setReferenceMerchantId($referenceMerchantId);
    $alipaySettlementInfoUpdateRequest->setUpdateRequestId("update_" . round(microtime(true) * 1000));
    $alipaySettlementInfoUpdateRequest->setSettlementCurrency("BRL");
    $settlementBankAccount = new \Model\SettlementBankAccount();
    $settlementBankAccount->setBranchCode("1231");
    $settlementBankAccount->setRoutingNumber("12");
    $settlementBankAccount->setAccountType(\Model\AccountType::CHECKING);
    $settlementBankAccount->setAccountHolderTIN("1213214");
    $settlementBankAccount->setAccountHolderName("Timi");
    $settlementBankAccount->setBankAccountNo("121232141");
    $settlementBankAccount->setAccountHolderType(\Model\AccountHolderType::ENTERPRISE);
    $alipaySettlementInfoUpdateRequest->setSettlementBankAccount($settlementBankAccount);

    $alipayClient = new DefaultAlipayClient("https://open-na.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipaySettlementInfoUpdateRequest);

    echo json_encode($alipayResponse);
}

function queryBalance($referenceMerchantId)
{
    $alipayInquireBalanceRequest = new \Request\marketplace\AlipayInquireBalanceRequest();
    $alipayInquireBalanceRequest->setReferenceMerchantId($referenceMerchantId);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipayInquireBalanceRequest);

    echo json_encode($alipayResponse);
}

function paymentId($paymentId)
{
    $alipaySettleRequest = new \Request\marketplace\AlipaySettleRequest();
    $alipaySettleRequest->setPaymentId($paymentId);
    $alipaySettleRequest->setSettlementRequestId("settle_" . round(microtime(true) * 1000));
    $settlementDetail = new \Model\SettlementDetail();
    $settlementDetail->setSettleTo(\Model\SettleToType::SELLER);
    $amount = new \Model\Amount();
    $amount->setValue("90");
    $amount->setCurrency("BRL");
    $settlementDetail->setSettlementAmount($amount);

    $settlementDetail1 = new \Model\SettlementDetail();
    $settlementDetail1->setSettleTo(\Model\SettleToType::MARKETPLACE);
    $amount1 = new \Model\Amount();
    $amount1->setValue("10");
    $amount1->setCurrency("BRL");
    $settlementDetail1->setSettlementAmount($amount);

    $alipaySettleRequest->setSettlementDetails([$settlementDetail, $settlementDetail1]);


    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipaySettleRequest);

    echo json_encode($alipayResponse);

}


function createPayout()
{
    $alipayCreatePayoutRequest = new \Request\marketplace\AlipayCreatePayoutRequest();
    $alipayCreatePayoutRequest->setTransferRequestId("transfer_" . round(microtime(true) * 1000));

    $transferFromDetail = new \Model\TransferFromDetail();
    $paymentMethod = new \Model\PaymentMethod();
    $paymentMethod->setPaymentMethodId(round(microtime(true) * 1000));
    $paymentMethod->setPaymentMethodType(\Model\WalletPaymentMethodType::BALANCE_ACCOUNT);
    $transferFromDetail->setTransferFromMethod($paymentMethod);
    $alipayCreatePayoutRequest->setTransferFromDetail($transferFromDetail);

    $transferToDetail = new \Model\TransferToDetail();
    $paymentMethod1 = new \Model\PaymentMethod();
    $paymentMethod1->setPaymentMethodId(round(microtime(true) * 1000));
    $paymentMethod1->setPaymentMethodType(\Model\WalletPaymentMethodType::SETTLEMENT_CARD);
    $transferToDetail->setTransferToMethod($paymentMethod1);
    $transferToDetail->setTransferToCurrency("BRL");
    $transferToDetail->setPurposeCode("GSD");
    $transferToDetail->setTransferNotifyUrl("www.alipay.com");
    $alipayCreatePayoutRequest->setTransferToDetail($transferToDetail);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipayCreatePayoutRequest);

    echo json_encode($alipayResponse);
}

function createTransfer()
{
    $alipayCreateTransferRequest = new \Request\marketplace\AlipayCreateTransferRequest();
    $alipayCreateTransferRequest->setTransferRequestId("transfer_" . round(microtime(true) * 1000));

    $transferFromDetail = new \Model\TransferFromDetail();
    $paymentMethod = new \Model\PaymentMethod();
    $paymentMethod->setPaymentMethodId(round(microtime(true) * 1000));
    $paymentMethod->setPaymentMethodType(\Model\WalletPaymentMethodType::BALANCE_ACCOUNT);
    $amount = new \Model\Amount();
    $amount->setValue("100");
    $amount->setCurrency("BRL");
    $transferFromDetail->setTransferFromAmount($amount);
    $transferFromDetail->setTransferFromMethod($paymentMethod);
    $alipayCreateTransferRequest->setTransferFromDetail($transferFromDetail);

    $transferToDetail = new \Model\TransferToDetail();
    $paymentMethod1 = new \Model\PaymentMethod();
    $paymentMethod1->setPaymentMethodId(round(microtime(true) * 1000));
    $paymentMethod1->setPaymentMethodType(\Model\WalletPaymentMethodType::BALANCE_ACCOUNT);
    $transferToDetail->setTransferToMethod($paymentMethod1);
    $transferToDetail->setTransferToCurrency("BRL");
    $transferToDetail->setPurposeCode("GSD");
    $transferToDetail->setTransferNotifyUrl("www.alipay.com");
    $alipayCreateTransferRequest->setTransferToDetail($transferToDetail);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipayCreateTransferRequest);

    echo json_encode($alipayResponse);
}

//register();
update("outmid_wangzunjiao_wzj_20240929_100432_437");

