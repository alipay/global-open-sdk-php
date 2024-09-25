<?php

namespace Request\notify;

class AlipayCaptureResultNotify
{

    public $captureRequestId;

    public $paymentId;

    public $captureId;

    public $captureAmount;

    public $captureTime;

    public $acquirerReferenceNo;

    public $acquirerInfo;

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
    public function setCaptureRequestId($captureRequestId): void
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
    public function setPaymentId($paymentId): void
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
    public function setCaptureId($captureId): void
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
    public function setCaptureAmount($captureAmount): void
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
    public function setCaptureTime($captureTime): void
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
    public function setAcquirerReferenceNo($acquirerReferenceNo): void
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
    public function setAcquirerInfo($acquirerInfo): void
    {
        $this->acquirerInfo = $acquirerInfo;
    }





}