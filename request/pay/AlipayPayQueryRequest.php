<?php

namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayPayQueryRequest extends AlipayRequest
{

    public $paymentRequestId;
    public $paymentId;

    public $merchantAccountId;



    function __construct()
    {
        $this->setPath(AntomPathConstants::INQUIRY_PAYMENT_PATH);
    }

    /**
     * @return mixed
     */
    public function getPaymentRequestId()
    {
        return $this->paymentRequestId;
    }

    /**
     * @param mixed $paymentRequestId
     */
    public function setPaymentRequestId($paymentRequestId)
    {
        $this->paymentRequestId = $paymentRequestId;
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
    public function getMerchantAccountId()
    {
        return $this->merchantAccountId;
    }

    /**
     * @param mixed $merchantAccountId
     */
    public function setMerchantAccountId($merchantAccountId)
    {
        $this->merchantAccountId = $merchantAccountId;
    }

}