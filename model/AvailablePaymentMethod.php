<?php

namespace Model;

class AvailablePaymentMethod
{
    public $paymentMethodTypeList;
    public $paymentMethodMetaData;

    /**
     * @return mixed
     */
    public function getPaymentMethodMetaData()
    {
        return $this->paymentMethodMetaData;
    }

    /**
     * @param mixed $paymentMethodMetaData
     */
    public function setPaymentMethodMetaData($paymentMethodMetaData)
    {
        $this->paymentMethodMetaData = $paymentMethodMetaData;
    }



    /**
     * @return mixed
     */
    public function getPaymentMethodTypeList()
    {
        return $this->paymentMethodTypeList;
    }

    /**。/
     * @param mixed $paymentMethodTypeList
     */
    public function setPaymentMethodTypeList($paymentMethodTypeList)
    {
        $this->paymentMethodTypeList = $paymentMethodTypeList;
    }


}