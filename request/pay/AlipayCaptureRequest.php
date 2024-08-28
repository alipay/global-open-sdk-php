<?php

namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayCaptureRequest extends AlipayRequest
{

    public $captureRequestId;
    public $paymentId;
    public $captureAmount;
    public $isLastCapture;


    function __construct()
    {
        $this->setPath(AntomPathConstants::CAPTURE_PATH);
    }


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
    public function getIsLastCapture()
    {
        return $this->isLastCapture;
    }

    /**
     * @param mixed $isLastCapture
     */
    public function setIsLastCapture($isLastCapture)
    {
        $this->isLastCapture = $isLastCapture;
    }


}