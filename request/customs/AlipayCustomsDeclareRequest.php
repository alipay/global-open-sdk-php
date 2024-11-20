<?php

namespace Request\customs;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayCustomsDeclareRequest extends AlipayRequest
{
    public $declarationRequestId;
    public $paymentId;
    public $declarationAmount;
    public $customs;
    public $merchantCustomsInfo;
    public $splitOrder;
    public $subOrderId;
    public $buyerCertificate;

    function __construct()
    {
        $this->setPath(AntomPathConstants::DECLARE_PATH);
    }


    /**
     * @return mixed
     */
    public function getDeclarationRequestId()
    {
        return $this->declarationRequestId;
    }

    /**
     * @param mixed $declarationRequestId
     */
    public function setDeclarationRequestId($declarationRequestId) 
    {
        $this->declarationRequestId = $declarationRequestId;
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
    public function getDeclarationAmount()
    {
        return $this->declarationAmount;
    }

    /**
     * @param mixed $declarationAmount
     */
    public function setDeclarationAmount($declarationAmount) 
    {
        $this->declarationAmount = $declarationAmount;
    }

    /**
     * @return mixed
     */
    public function getCustoms()
    {
        return $this->customs;
    }

    /**
     * @param mixed $customs
     */
    public function setCustoms($customs) 
    {
        $this->customs = $customs;
    }

    /**
     * @return mixed
     */
    public function getMerchantCustomsInfo()
    {
        return $this->merchantCustomsInfo;
    }

    /**
     * @param mixed $merchantCustomsInfo
     */
    public function setMerchantCustomsInfo($merchantCustomsInfo) 
    {
        $this->merchantCustomsInfo = $merchantCustomsInfo;
    }

    /**
     * @return mixed
     */
    public function getSplitOrder()
    {
        return $this->splitOrder;
    }

    /**
     * @param mixed $splitOrder
     */
    public function setSplitOrder($splitOrder) 
    {
        $this->splitOrder = $splitOrder;
    }

    /**
     * @return mixed
     */
    public function getSubOrderId()
    {
        return $this->subOrderId;
    }

    /**
     * @param mixed $subOrderId
     */
    public function setSubOrderId($subOrderId) 
    {
        $this->subOrderId = $subOrderId;
    }

    /**
     * @return mixed
     */
    public function getBuyerCertificate()
    {
        return $this->buyerCertificate;
    }

    /**
     * @param mixed $buyerCertificate
     */
    public function setBuyerCertificate($buyerCertificate) 
    {
        $this->buyerCertificate = $buyerCertificate;
    }


}