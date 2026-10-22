<?php

namespace Request\pay;

use Exception;
use Model\Amount;
use Model\InStorePaymentScenario;
use Model\PaymentFactor;
use Model\PaymentMethod;
use Model\ProductCodeType;

class EntryCodePaymentRequest extends AlipayPayRequest
{
    public function __construct($paymentRequestId, $order, $currency, $amountInCents, $paymentNotifyUrl, $paymentExpiryTime)
    {
        parent::__construct();
        $this->setPath('/ams/api/v1/payments/pay');
        $this->setProductCode(ProductCodeType::IN_STORE_PAYMENT);

        $paymentAmount = new Amount();
        $paymentAmount->setCurrency($currency);
        $paymentAmount->setValue($amountInCents);
        $this->setPaymentAmount($paymentAmount);

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setPaymentMethodType('CONNECT_WALLET');
        $this->setPaymentMethod($paymentMethod);

        $paymentFactor = new PaymentFactor();
        $paymentFactor->setInStorePaymentScenario(InStorePaymentScenario::ENTRY_CODE);
        $this->setPaymentFactor($paymentFactor);

        $this->setPaymentRequestId($paymentRequestId);
        $this->setOrder($order);

        if (isset($paymentNotifyUrl)) {
            $this->setPaymentNotifyUrl($paymentNotifyUrl);
        }

        if (isset($paymentExpiryTime)) {
            $this->setPaymentExpiryTime($paymentExpiryTime);
        }

    }

    public function validate()
    {
        $order = $this->getOrder();
        $this->assertTrue($order !== null, "order required.");
        $merchant = $order->getMerchant();
        $this->assertTrue($merchant !== null, "order.merchant required.");
        $this->assertTrue($order->getOrderAmount() !== null, "order.orderAmount required.");
        $this->assertTrue($order->getOrderDescription() !== null, "order.orderDescription required.");
        $this->assertTrue($merchant->getReferenceMerchantId() !== null, "order.merchant.referenceMerchantId required.");
        $this->assertTrue($merchant->getMerchantMCC() !== null, "order.merchant.merchantMcc required.");
        $this->assertTrue($merchant->getMerchantName() !== null, "order.merchant.merchantName required.");
        $store = $merchant->getStore();
        $this->assertTrue($store !== null, "order.merchant.store required.");
        $this->assertTrue($store->getReferenceStoreId() !== null, "order.merchant.store.referenceStoreId required.");
        $this->assertTrue($store->getStoreName() !== null, "order.merchant.store.storeName required.");
        $this->assertTrue($store->getStoreMCC() !== null, "order.merchant.store.storeMcc required.");
        $env = $order->getEnv();
        $this->assertTrue($env !== null, "order.env required.");
        $this->assertTrue($env->getUserAgent() !== null, "order.env.userAgent required.");

    }

    public function assertTrue($exp, $msg)
    {
        if (!$exp) {
            throw new Exception($msg);
        }
    }

}
