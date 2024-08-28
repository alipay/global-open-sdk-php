<?php

//request
require __DIR__ . '/request/AlipayRequest.php';

//auth
require __DIR__ . '/request/auth/AlipayAuthApplyTokenRequest.php';
require __DIR__ . '/request/auth/AlipayAuthConsultRequest.php';
require __DIR__ . '/request/auth/AlipayAuthQueryTokenRequest.php';
require __DIR__ . '/request/auth/AlipayAuthRevokeTokenRequest.php';

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

//risk
require __DIR__ . '/request/risk/AlipayRiskScoreInquiryRequest.php';


//subscription
require __DIR__ . '/request/subscription/AlipaySubscriptionCancelRequest.php';
require __DIR__ . '/request/subscription/AlipaySubscriptionChangeRequest.php';
require __DIR__ . '/request/subscription/AlipaySubscriptionCreateRequest.php';

//user
require __DIR__ . '/request/users/AlipayInitAuthenticationRequest.php';
require __DIR__ . '/request/users/AlipayUserQueryInfoRequest.php';
require __DIR__ . '/request/users/AlipayVerifyAuthenticationRequest.php';


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

//client
require __DIR__ . '/client/BaseAlipayClient.php';
require __DIR__ . '/client/DefaultAlipayClient.php';
require __DIR__ . '/client/SignatureTool.php';






















