<?php

namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayRetrievePaymentSessionRequest extends AlipayRequest
{
    public $paymentRequestId;

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

    public function __construct()
    {
        $this->setPath(AntomPathConstants::RETRIEVE_PATH);
    }
}
