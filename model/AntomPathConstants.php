<?php

namespace Model;

class AntomPathConstants
{
    public const AUTH_CONSULT_PATH = '/ams/api/v1/authorizations/consult';
    public const AUTH_APPLY_TOKEN_PATH = '/ams/api/v1/authorizations/applyToken';
    public const AUTH_QUERY_PATH = '/ams/api/v1/authorizations/query';
    public const AUTH_REVOKE_PATH = '/ams/api/v1/authorizations/revoke';
    public const CREATE_VAULTING_SESSION_PATH = '/ams/api/v1/vaults/createVaultingSession';
    public const VAULT_PAYMENT_METHOD_PATH = '/ams/api/v1/vaults/vaultPaymentMethod';
    public const INQUIRE_VAULTING_PATH = '/ams/api/v1/vaults/inquireVaulting';
    public const CONSULT_PAYMENT_PATH = '/ams/api/v1/payments/consult';
    public const PAYMENT_PATH = '/ams/api/v1/payments/pay';
    public const CREATE_SESSION_PATH = '/ams/api/v1/payments/createPaymentSession';
    public const CAPTURE_PATH = '/ams/api/v1/payments/capture';
    public const INQUIRY_PAYMENT_PATH = '/ams/api/v1/payments/inquiryPayment';
    public const CANCEL_PATH = '/ams/api/v1/payments/cancel';
    public const SYNC_ARREAR_PATH = "/ams/api/v1/payments/syncArrear";
    public const CREATE_DEVICE_CERTIFICATE_PATH = "/ams/api/v1/payments/createDeviceCertificate";
    public const SUBSCRIPTION_CREATE_PATH = '/ams/api/v1/subscriptions/create';
    public const SUBSCRIPTION_CHANGE_PATH = '/ams/api/v1/subscriptions/change';
    public const SUBSCRIPTION_CANCEL_PATH = '/ams/api/v1/subscriptions/cancel';
    public const SUBSCRIPTION_UPDATE_PATH = "/ams/api/v1/subscriptions/update";
    public const ACCEPT_DISPUTE_PATH = '/ams/api/v1/payments/acceptDispute';
    public const SUPPLY_DEFENCE_DOC_PATH = '/ams/api/v1/payments/supplyDefenseDocument';
    public const DOWNLOAD_DISPUTE_EVIDENCE_PATH = '/ams/api/v1/payments/downloadDisputeEvidence';
    public const REFUND_PATH = '/ams/api/v1/payments/refund';

    public const RETRIEVE_PATH = "/ams/api//v1/payments/retrievePaymentSession";
    public const INQUIRY_REFUND_PATH = '/ams/api/v1/payments/inquiryRefund';
    public const DECLARE_PATH = '/ams/api/v1/customs/declare';
    public const INQUIRY_DECLARE_PATH = '/ams/api/v1/customs/inquiryDeclarationRequests';
    public const MARKETPLACE_SUBMITATTACHMENT_PATH = '/ams/api/open/openapiv2_file/v1/business/attachment/submitAttachment';
    public const MARKETPLACE_REGISTER_PATH = '/ams/api/v1/merchants/register';
    public const MARKETPLACE_SETTLEMENTINFO_UPDATE_PATH = '/ams/api/v1/merchants/settlementInfo/update';
    public const MARKETPLACE_INQUIREBALANCE_PATH = '/ams/api/v1/accounts/inquireBalance';
    public const MARKETPLACE_SETTLE_PATH = '/ams/api/v1/payments/settle';
    public const MARKETPLACE_CREATEPAYOUT_PATH = '/ams/api/v1/funds/createPayout';
    public const MARKETPLACE_CREATETRANSFER_PATH = '/ams/api/v1/funds/createTransfer';
    public const RISK_DECIDE_PATH = '/ams/api/v1/risk/payments/decide';
    public const RISK_REPORT_PATH = '/ams/api/v1/risk/payments/reportRisk';
    public const RISK_SEND_PAYMENT_RESULT_PATH = '/ams/api/v1/risk/payments/sendPaymentResult';
    public const RISK_SEND_REFUND_RESULT_PATH = '/ams/api/v1/risk/payments/sendRefundResult';

    public const PAYMENT_INQUIRE_EXCHANGE_RATE_PATH = "/ams/api/v1/payments/inquireExchangeRate";

    public const  ABA_INQUERY_STATEMENT_LIST_PATH = "/ams/api/v1/aba/accounts/inquiryStatementList";


}
