<?php

namespace Model;

class PaymentDetail
{
    public $amount;
    public $paymentMethod;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount) 
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod) 
    {
        $this->paymentMethod = $paymentMethod;
    }



}