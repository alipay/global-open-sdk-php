<?php

require_once 'request/AlipayRequest.php';
require_once 'model/AntomPathConstants.php';

class AlipayPayQueryRequest extends AlipayRequest{

    public $paymentRequestId;
    public $paymentId;


    function __construct(){
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

}