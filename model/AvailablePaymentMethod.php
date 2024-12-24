<?php

namespace Model;

class AvailablePaymentMethod
{
    public $paymentMethodTypeList;

    /**
     * @return mixed
     */
    public function getPaymentMethodTypeList()
    {
        return $this->paymentMethodTypeList;
    }

    /**
     * @param mixed $paymentMethodTypeList
     */
    public function setPaymentMethodTypeList($paymentMethodTypeList): void
    {
        $this->paymentMethodTypeList = $paymentMethodTypeList;
    }


}