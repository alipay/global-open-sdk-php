<?php

namespace Model;

class InvoicePaymentInfo
{
    public $result;
    public $paymentId;
    public $paymentAmount;
    public $paymentTime;

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param mixed $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * @param mixed $paymentTime
     */
    public function setPaymentTime($paymentTime)
    {
        $this->paymentTime = $paymentTime;
    }


}
