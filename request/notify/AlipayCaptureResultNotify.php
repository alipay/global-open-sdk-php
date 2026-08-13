<?php

namespace Request\notify;

class AlipayCaptureResultNotify extends \Request\notify\AlipayNotify
{
    public $captureRequestId;

    public $paymentId;

    public $captureId;

    public $captureAmount;

    public $captureTime;

    public $acquirerReferenceNo;

    public $acquirerInfo;

    /**
     * The tax calculation ID associated with the payment. Retain it for reconciliation and
     * subsequent refunds; query tax details through inquireTransactionList. It does not indicate
     * that tax has been posted or recorded. If absent, the payment is not subject to tax.
     */
    public $taxCalculationId;

    /**
     * @return mixed
     */
    public function getCaptureRequestId()
    {
        return $this->captureRequestId;
    }

    /**
     * @param mixed $captureRequestId
     */
    public function setCaptureRequestId($captureRequestId)
    {
        $this->captureRequestId = $captureRequestId;
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
    public function getCaptureId()
    {
        return $this->captureId;
    }

    /**
     * @param mixed $captureId
     */
    public function setCaptureId($captureId)
    {
        $this->captureId = $captureId;
    }

    /**
     * @return mixed
     */
    public function getCaptureAmount()
    {
        return $this->captureAmount;
    }

    /**
     * @param mixed $captureAmount
     */
    public function setCaptureAmount($captureAmount)
    {
        $this->captureAmount = $captureAmount;
    }

    /**
     * @return mixed
     */
    public function getCaptureTime()
    {
        return $this->captureTime;
    }

    /**
     * @param mixed $captureTime
     */
    public function setCaptureTime($captureTime)
    {
        $this->captureTime = $captureTime;
    }

    /**
     * @return mixed
     */
    public function getAcquirerReferenceNo()
    {
        return $this->acquirerReferenceNo;
    }

    /**
     * @param mixed $acquirerReferenceNo
     */
    public function setAcquirerReferenceNo($acquirerReferenceNo)
    {
        $this->acquirerReferenceNo = $acquirerReferenceNo;
    }

    /**
     * @return mixed
     */
    public function getAcquirerInfo()
    {
        return $this->acquirerInfo;
    }

    /**
     * @param mixed $acquirerInfo
     */
    public function setAcquirerInfo($acquirerInfo)
    {
        $this->acquirerInfo = $acquirerInfo;
    }

    /**
     * @return mixed
     */
    public function getTaxCalculationId()
    {
        return $this->taxCalculationId;
    }

    /**
     * @param mixed $taxCalculationId
     */
    public function setTaxCalculationId($taxCalculationId): void
    {
        $this->taxCalculationId = $taxCalculationId;
    }





}
