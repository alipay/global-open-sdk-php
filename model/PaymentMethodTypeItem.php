<?php

namespace Model;

class PaymentMethodTypeItem
{
    public $paymentMethodType;
    public $paymentMethodOrder;
    public $expressCheckout;

    /**
     * @return mixed
     */
    public function getPaymentMethodType()
    {
        return $this->paymentMethodType;
    }

    /**
     * @param mixed $paymentMethodType
     */
    public function setPaymentMethodType($paymentMethodType): void
    {
        $this->paymentMethodType = $paymentMethodType;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodOrder()
    {
        return $this->paymentMethodOrder;
    }

    /**
     * @param mixed $paymentMethodOrder
     */
    public function setPaymentMethodOrder($paymentMethodOrder): void
    {
        $this->paymentMethodOrder = $paymentMethodOrder;
    }

    /**
     * @return mixed
     */
    public function getExpressCheckout()
    {
        return $this->expressCheckout;
    }

    /**
     * @param mixed $expressCheckout
     */
    public function setExpressCheckout($expressCheckout): void
    {
        $this->expressCheckout = $expressCheckout;
    }


}