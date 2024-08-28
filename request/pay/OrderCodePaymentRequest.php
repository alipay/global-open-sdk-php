<?php

namespace Request\pay;

use Exception;
use Model\Amount;
use Model\InStorePaymentScenario;
use Model\PaymentFactor;
use Model\PaymentMethod;
use Model\ProductCodeType;

class OrderCodePaymentRequest extends AlipayPayRequest
{


    function __construct($paymentRequestId, $order, $currency, $amountInCents, $paymentNotifyUrl, $paymentExpiryTime)
    {
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
        $paymentFactor->setInStorePaymentScenario(InStorePaymentScenario::OrderCode);
        $this->setPaymentFactor($paymentFactor);

        $this->setPaymentRequestId($paymentRequestId);
        $this->setOrder($order);

        if (isset($paymentNotifyUrl)) {
            $this->setPaymentNotifyUrl($paymentNotifyUrl);
        }

        if (isset($paymentExpiryTime)) {
            $this->setPaymentExpireTime($paymentExpiryTime);
        }

    }

    function validate()
    {
        $this->assertTrue(isset($this->order), "order required.");
        $this->assertTrue(isset($this->order->merchant), "order.merchant required.");
        $this->assertTrue(isset($this->order->orderAmount), "order.orderAmount required.");
        $this->assertTrue(isset($this->order->orderDescription), "order.orderDescription required.");
        $this->assertTrue(isset($this->order->merchant->referenceMerchantId), "order.merchant.referenceMerchantId required.");
        $this->assertTrue(isset($this->order->merchant->merchantMCC), "order.merchant.merchantMcc required.");
        $this->assertTrue(isset($this->order->merchant->merchantName), "order.merchant.merchantName required.");
        $this->assertTrue(isset($this->order->merchant->store), "order.merchant.store required.");
        $this->assertTrue(isset($this->order->merchant->store->referenceStoreId), "order.merchant.store.referenceStoreId required.");
        $this->assertTrue(isset($this->order->merchant->store->storeName), "order.merchant.store.storeName required.");
        $this->assertTrue(isset($this->order->merchant->store->storeMCC), "order.merchant.store.storeMcc required.");
    }

    function assertTrue($exp, $msg)
    {
        if (!$exp) {
            throw new Exception($msg);
        }
    }

}