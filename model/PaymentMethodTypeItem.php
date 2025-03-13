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
    public function setPaymentMethodType($paymentMethodType)
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
    public function setPaymentMethodOrder($paymentMethodOrder)
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
    public function setExpressCheckout($expressCheckout)
    {
        $this->expressCheckout = $expressCheckout;
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}