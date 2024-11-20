<?php

namespace Request\risk;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class SendRefundResultRequest extends AlipayRequest
{

    public $referenceTransactionId;
    public $referenceRefundId;
    public $actualRefundAmount;
    public $refundRecords;

    function __construct()
    {
        $this->setPath(AntomPathConstants::RISK_SEND_REFUND_RESULT_PATH);
    }

    /**
     * @return mixed
     */
    public function getReferenceTransactionId()
    {
        return $this->referenceTransactionId;
    }

    /**
     * @param mixed $referenceTransactionId
     */
    public function setReferenceTransactionId($referenceTransactionId) 
    {
        $this->referenceTransactionId = $referenceTransactionId;
    }

    /**
     * @return mixed
     */
    public function getReferenceRefundId()
    {
        return $this->referenceRefundId;
    }

    /**
     * @param mixed $referenceRefundId
     */
    public function setReferenceRefundId($referenceRefundId) 
    {
        $this->referenceRefundId = $referenceRefundId;
    }

    /**
     * @return mixed
     */
    public function getActualRefundAmount()
    {
        return $this->actualRefundAmount;
    }

    /**
     * @param mixed $actualRefundAmount
     */
    public function setActualRefundAmount($actualRefundAmount) 
    {
        $this->actualRefundAmount = $actualRefundAmount;
    }

    /**
     * @return mixed
     */
    public function getRefundRecords()
    {
        return $this->refundRecords;
    }

    /**
     * @param mixed $refundRecords
     */
    public function setRefundRecords($refundRecords) 
    {
        $this->refundRecords = $refundRecords;
    }


}