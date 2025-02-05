<?php

//request
require __DIR__ . '/request/AlipayRequest.php';

//auth
require __DIR__ . '/request/auth/AlipayAuthApplyTokenRequest.php';
require __DIR__ . '/request/auth/AlipayAuthConsultRequest.php';
require __DIR__ . '/request/auth/AlipayAuthQueryTokenRequest.php';
require __DIR__ . '/request/auth/AlipayAuthRevokeTokenRequest.php';
require __DIR__ . '/request/auth/AlipayAuthCreateSessionRequest.php';

//customs
require __DIR__ . '/request/customs/AlipayCustomsDeclareRequest.php';
require __DIR__ . '/request/customs/AlipayCustomsQueryRequest.php';

//merchant
require __DIR__ . '/request/merchant/AlipayMerchantRegistrationInfoQueryRequest.php';
require __DIR__ . '/request/merchant/AlipayMerchantRegistrationRequest.php';
require __DIR__ . '/request/merchant/AlipayMerchantRegistrationStatusQueryRequest.php';

//order
require __DIR__ . '/request/order/AlipayCreateOrderRequest.php';

//pay
require __DIR__ . '/request/pay/AlipayCaptureRequest.php';
require __DIR__ . '/request/pay/AlipayInquiryRefundRequest.php';
require __DIR__ . '/request/pay/AlipayPayCancelRequest.php';
require __DIR__ . '/request/pay/AlipayPayConsultRequest.php';
require __DIR__ . '/request/pay/AlipayPaymentSessionRequest.php';
require __DIR__ . '/request/pay/AlipayPayQueryRequest.php';
require __DIR__ . '/request/pay/AlipayPayRequest.php';
require __DIR__ . '/request/pay/AlipayRefundRequest.php';
require __DIR__ . '/request/pay/EntryCodePaymentRequest.php';
require __DIR__ . '/request/pay/OrderCodePaymentRequest.php';
require __DIR__ . '/request/pay/UserPresentedCodePaymentRequest.php';


//subscription
require __DIR__ . '/request/subscription/AlipaySubscriptionUpdateRequest.php';
require __DIR__ . '/request/subscription/AlipaySubscriptionChangeRequest.php';
require __DIR__ . '/request/subscription/AlipaySubscriptionCreateRequest.php';
require __DIR__ . '/request/subscription/AlipaySubscriptionCancelRequest.php';

//user
require __DIR__ . '/request/users/AlipayInitAuthenticationRequest.php';
require __DIR__ . '/request/users/AlipayUserQueryInfoRequest.php';
require __DIR__ . '/request/users/AlipayVerifyAuthenticationRequest.php';

//marketplace
require __DIR__ . '/request/marketplace/AlipayCreatePayoutRequest.php';
require __DIR__ . '/request/marketplace/AlipayCreateTransferRequest.php';
require __DIR__ . '/request/marketplace/AlipayInquireBalanceRequest.php';
require __DIR__ . '/request/marketplace/AlipayRegisterRequest.php';
require __DIR__ . '/request/marketplace/AlipaySettlementInfoUpdateRequest.php';
require __DIR__ . '/request/marketplace/AlipaySettleRequest.php';
require __DIR__ . '/request/marketplace/AlipaySubmitAttachmentRequest.php';

//dispute
require __DIR__ . '/request/dispute/AlipayAcceptDisputeRequest.php';
require __DIR__ . '/request/dispute/AlipayDownloadDisputeEvidenceRequest.php';
require __DIR__ . '/request/dispute/AlipaySupplyDefenseDocumentRequest.php';


//risk
require __DIR__ . '/request/risk/RiskDecideRequest.php';
require __DIR__ . '/request/risk/RiskReportRequest.php';
require __DIR__ . '/request/risk/SendPaymentResultRequest.php';
require __DIR__ . '/request/risk/SendRefundResultRequest.php';
require __DIR__ . '/request/risk/AlipayRiskScoreInquiryRequest.php';


//vaulting
require __DIR__ . '/request/vaulting/AlipayVaultingPaymentMethodRequest.php';
require __DIR__ . '/request/vaulting/AlipayVaultingQueryRequest.php';
require __DIR__ . '/request/vaulting/AlipayVaultingSessionRequest.php';

//notify
require __DIR__ . '/request/notify/AlipayNotify.php';
require __DIR__ . '/request/notify/AlipayAuthNotify.php';
require __DIR__ . '/request/notify/AlipayCaptureResultNotify.php';
require __DIR__ . '/request/notify/AlipayDisputeNotify.php';
require __DIR__ . '/request/notify/AlipayPayResultNotify.php';
require __DIR__ . '/request/notify/AlipayRefundNotify.php';
require __DIR__ . '/request/notify/AlipaySubscriptionNotify.php';
require __DIR__ . '/request/notify/AlipaySubscriptionPayNotify.php';
require __DIR__ . '/request/notify/AlipayVaultingNotify.php';




//model
require __DIR__ . '/model/Address.php';
require __DIR__ . '/model/Amount.php';
require __DIR__ . '/model/AmountLimit.php';
require __DIR__ . '/model/AmountLimitInfo.php';
require __DIR__ . '/model/AntomPathConstants.php';
require __DIR__ . '/model/Attachment.php';
require __DIR__ . '/model/AuthenticationChannelType.php';
require __DIR__ . '/model/AuthenticationType.php';
require __DIR__ . '/model/BrowserInfo.php';
require __DIR__ . '/model/Buyer.php';
require __DIR__ . '/model/CardBrand.php';
require __DIR__ . '/model/CardPaymentMethodDetail.php';
require __DIR__ . '/model/Certificate.php';
require __DIR__ . '/model/CertificateType.php';
require __DIR__ . '/model/ChallengeActionForm.php';
require __DIR__ . '/model/ChallengeTriggerSourceType.php';
require __DIR__ . '/model/ChallengeType.php';
require __DIR__ . '/model/CodeDetail.php';
require __DIR__ . '/model/CodeValueType.php';
require __DIR__ . '/model/ContactInfo.php';
require __DIR__ . '/model/CouponPaymentMethodDetail.php';
require __DIR__ . '/model/CreditPayFeeType.php';
require __DIR__ . '/model/CreditPayPlan.php';
require __DIR__ . '/model/CustomerBelongsTo.php';
require __DIR__ . '/model/CustomerIdType.php';
require __DIR__ . '/model/CustomsInfo.php';
require __DIR__ . '/model/DiscountPaymentMethodDetail.php';
require __DIR__ . '/model/DisplayType.php';
require __DIR__ . '/model/Env.php';
require __DIR__ . '/model/ExternalPaymentMethodDetail.php';
require __DIR__ . '/model/Goods.php';
require __DIR__ . '/model/GrantType.php';
require __DIR__ . '/model/HttpRpcResult.php';
require __DIR__ . '/model/InStorePaymentScenario.php';
require __DIR__ . '/model/Logo.php';
require __DIR__ . '/model/Merchant.php';
require __DIR__ . '/model/MerchantCustomsInfo.php';
require __DIR__ . '/model/MerchantRegistrationInfo.php';
require __DIR__ . '/model/MerchantType.php';
require __DIR__ . '/model/Order.php';
require __DIR__ . '/model/OrderCodeForm.php';
require __DIR__ . '/model/OrderInfo.php';
require __DIR__ . '/model/OsType.php';
require __DIR__ . '/model/PaymentFactor.php';
require __DIR__ . '/model/PaymentMethod.php';
require __DIR__ . '/model/PaymentMethodCategoryType.php';
require __DIR__ . '/model/PaymentMethodDetail.php';
require __DIR__ . '/model/PaymentMethodDetailType.php';
require __DIR__ . '/model/PaymentMethodInfo.php';
require __DIR__ . '/model/PaymentOption.php';
require __DIR__ . '/model/PaymentVerificationData.php';
require __DIR__ . '/model/PeriodRule.php';
require __DIR__ . '/model/PresentmentMode.php';
require __DIR__ . '/model/ProductCodeType.php';
require __DIR__ . '/model/PspCustomerInfo.php';
require __DIR__ . '/model/Quote.php';
require __DIR__ . '/model/RedirectActionForm.php';
require __DIR__ . '/model/RegistrationDetail.php';
require __DIR__ . '/model/Result.php';
require __DIR__ . '/model/ResultStatusType.php';
require __DIR__ . '/model/RiskScoreDetail.php';
require __DIR__ . '/model/RiskScoreResult.php';
require __DIR__ . '/model/RiskScoreType.php';
require __DIR__ . '/model/ScopeType.php';
require __DIR__ . '/model/SettlementStrategy.php';
require __DIR__ . '/model/Shipping.php';
require __DIR__ . '/model/Store.php';
require __DIR__ . '/model/TerminalType.php';
require __DIR__ . '/model/TransactionType.php';
require __DIR__ . '/model/Transaction.php';
require __DIR__ . '/model/TransactionStatusType.php';
require __DIR__ . '/model/Trial.php';
require __DIR__ . '/model/UserIdentityType.php';
require __DIR__ . '/model/UserName.php';
require __DIR__ . '/model/WalletPaymentMethodType.php';
require __DIR__ . '/model/WebSite.php';
require __DIR__ . '/model/SettlementInfo.php';
require __DIR__ . '/model/AssociationType.php';
require __DIR__ . '/model/AttachmentType.php';
require __DIR__ . '/model/AuthorizationPhase.php';
require __DIR__ . '/model/BusinessInfo.php';
require __DIR__ . '/model/ClassType.php';
require __DIR__ . '/model/Company.php';
require __DIR__ . '/model/CompanyType.php';
require __DIR__ . '/model/CompanyUnitType.php';
require __DIR__ . '/model/Contact.php';
require __DIR__ . '/model/ContactType.php';
require __DIR__ . '/model/DisputeEvidenceType.php';
require __DIR__ . '/model/EntityAssociations.php';
require __DIR__ . '/model/Gaming.php';
require __DIR__ . '/model/Individual.php';
require __DIR__ . '/model/Leg.php';
require __DIR__ . '/model/LegalEntityType.php';
require __DIR__ . '/model/Lodging.php';
require __DIR__ . '/model/MerchantInfo.php';
require __DIR__ . '/model/Passenger.php';
require __DIR__ . '/model/PaymentDetail.php';
require __DIR__ . '/model/SettleToType.php';
require __DIR__ . '/model/SettlementBankAccount.php';
require __DIR__ . '/model/SettlementDetail.php';
require __DIR__ . '/model/StockInfo.php';
require __DIR__ . '/model/TransferFromDetail.php';
require __DIR__ . '/model/TransferToDetail.php';
require __DIR__ . '/model/TransitType.php';
require __DIR__ . '/model/Transit.php';
require __DIR__ . '/model/AccountType.php';
require __DIR__ . '/model/AccountHolderType.php';
require __DIR__ . '/model/ThreeDSResult.php';
require __DIR__ . '/model/PaymentResultInfo.php';
require __DIR__ . '/model/AcquirerInfo.php';
require __DIR__ . '/model/PeriodType.php';
require __DIR__ . '/model/CancellationType.php';
require __DIR__ . '/model/ApplePayConfiguration.php';
require __DIR__ . '/model/DisputeAcceptReasonType.php';
require __DIR__ . '/model/DisputeNotificationType.php';
require __DIR__ . '/model/AvailablePaymentMethod.php';
require __DIR__ . '/model/PaymentMethodTypeItem.php';
require __DIR__ . '/model/AgreementInfo.php';
require __DIR__ . '/model/Discount.php';



//client
require __DIR__ . '/client/BaseAlipayClient.php';
require __DIR__ . '/client/DefaultAlipayClient.php';
require __DIR__ . '/client/SignatureTool.php';
