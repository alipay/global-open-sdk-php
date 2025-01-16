<?php

namespace Model;

class AntomPathConstants
{
    const AUTH_CONSULT_PATH = '/ams/api/v1/authorizations/consult';
    const AUTH_APPLY_TOKEN_PATH = '/ams/api/v1/authorizations/applyToken';
    const AUTH_QUERY_PATH = '/ams/api/v1/authorizations/query';
    const AUTH_REVOKE_PATH = '/ams/api/v1/authorizations/revoke';
    const CREATE_VAULTING_SESSION_PATH = '/ams/api/v1/vaults/createVaultingSession';
    const VAULT_PAYMENT_METHOD_PATH = '/ams/api/v1/vaults/vaultPaymentMethod';
    const INQUIRE_VAULTING_PATH = '/ams/api/v1/vaults/inquireVaulting';
    const CONSULT_PAYMENT_PATH = '/ams/api/v1/payments/consult';
    const PAYMENT_PATH = '/ams/api/v1/payments/pay';
    const CREATE_SESSION_PATH = '/ams/api/v1/payments/createPaymentSession';
    const CAPTURE_PATH = '/ams/api/v1/payments/capture';
    const INQUIRY_PAYMENT_PATH = '/ams/api/v1/payments/inquiryPayment';
    const CANCEL_PATH = '/ams/api/v1/payments/cancel';
    const SYNC_ARREAR_PATH = "/ams/api/v1/payments/syncArrear";
    const CREATE_DEVICE_CERTIFICATE_PATH = "/ams/api/v1/payments/createDeviceCertificate";
    const SUBSCRIPTION_CREATE_PATH = '/ams/api/v1/subscriptions/create';
    const SUBSCRIPTION_CHANGE_PATH = '/ams/api/v1/subscriptions/change';
    const SUBSCRIPTION_CANCEL_PATH = '/ams/api/v1/subscriptions/cancel';
    const SUBSCRIPTION_UPDATE_PATH = "/ams/api/v1/subscriptions/update";
    const ACCEPT_DISPUTE_PATH = '/ams/api/v1/payments/acceptDispute';
    const SUPPLY_DEFENCE_DOC_PATH = '/ams/api/v1/payments/supplyDefenseDocument';
    const DOWNLOAD_DISPUTE_EVIDENCE_PATH = '/ams/api/v1/payments/downloadDisputeEvidence';
    const REFUND_PATH = '/ams/api/v1/payments/refund';
    const INQUIRY_REFUND_PATH = '/ams/api/v1/payments/inquiryRefund';
    const DECLARE_PATH = '/ams/api/v1/customs/declare';
    const INQUIRY_DECLARE_PATH = '/ams/api/v1/customs/inquiryDeclarationRequests';
    const MARKETPLACE_SUBMITATTACHMENT_PATH = '/ams/api/open/openapiv2_file/v1/business/attachment/submitAttachment';
    const MARKETPLACE_REGISTER_PATH = '/ams/api/v1/merchants/register';
    const MARKETPLACE_SETTLEMENTINFO_UPDATE_PATH = '/ams/api/v1/merchants/settlementInfo/update';
    const MARKETPLACE_INQUIREBALANCE_PATH = '/ams/api/v1/accounts/inquireBalance';
    const MARKETPLACE_SETTLE_PATH = '/ams/api/v1/payments/settle';
    const MARKETPLACE_CREATEPAYOUT_PATH = '/ams/api/v1/funds/createPayout';
    const MARKETPLACE_CREATETRANSFER_PATH = '/ams/api/v1/funds/createTransfer';
    const RISK_DECIDE_PATH = '/ams/api/v1/risk/payments/decide';
    const RISK_REPORT_PATH = '/ams/api/v1/risk/payments/reportRisk';
    const RISK_SEND_PAYMENT_RESULT_PATH = '/ams/api/v1/risk/payments/sendPaymentResult';
    const RISK_SEND_REFUND_RESULT_PATH = '/ams/api/v1/risk/payments/sendRefundResult';
}
