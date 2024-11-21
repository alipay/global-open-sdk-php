<?php

namespace Request\marketplace;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipaySettleRequest extends AlipayRequest
{
    public $settlementRequestId;

    public $paymentId;

    public $settlementDetails;


    function __construct()
    {
        $this->setPath(AntomPathConstants::MARKETPLACE_SETTLE_PATH);
    }

    /**
     * @return mixed
     */
    public function getSettlementRequestId()
    {
        return $this->settlementRequestId;
    }

    /**
     * @param mixed $settlementRequestId
     */
    public function setSettlementRequestId($settlementRequestId) 
    {
        $this->settlementRequestId = $settlementRequestId;
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
    public function getSettlementDetails()
    {
        return $this->settlementDetails;
    }

    /**
     * @param mixed $settlementDetails
     */
    public function setSettlementDetails($settlementDetails) 
    {
        $this->settlementDetails = $settlementDetails;
    }



}