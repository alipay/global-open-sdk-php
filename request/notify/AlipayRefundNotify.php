<?php

namespace Request\notify;


class AlipayRefundNotify extends \Request\notify\AlipayNotify
{

    public $refundStatus;

    public $refundRequestId;

    public $refundId;

    public $refundAmount;

    public $refundTime;

    public $grossSettlementAmount;

    public $settlementQuote;

    /**
     * @return mixed
     */
    public function getRefundStatus()
    {
        return $this->refundStatus;
    }

    /**
     * @param mixed $refundStatus
     */
    public function setRefundStatus($refundStatus) 
    {
        $this->refundStatus = $refundStatus;
    }

    /**
     * @return mixed
     */
    public function getRefundRequestId()
    {
        return $this->refundRequestId;
    }

    /**
     * @param mixed $refundRequestId
     */
    public function setRefundRequestId($refundRequestId) 
    {
        $this->refundRequestId = $refundRequestId;
    }

    /**
     * @return mixed
     */
    public function getRefundId()
    {
        return $this->refundId;
    }

    /**
     * @param mixed $refundId
     */
    public function setRefundId($refundId) 
    {
        $this->refundId = $refundId;
    }

    /**
     * @return mixed
     */
    public function getRefundAmount()
    {
        return $this->refundAmount;
    }

    /**
     * @param mixed $refundAmount
     */
    public function setRefundAmount($refundAmount) 
    {
        $this->refundAmount = $refundAmount;
    }

    /**
     * @return mixed
     */
    public function getRefundTime()
    {
        return $this->refundTime;
    }

    /**
     * @param mixed $refundTime
     */
    public function setRefundTime($refundTime) 
    {
        $this->refundTime = $refundTime;
    }

    /**
     * @return mixed
     */
    public function getGrossSettlementAmount()
    {
        return $this->grossSettlementAmount;
    }

    /**
     * @param mixed $grossSettlementAmount
     */
    public function setGrossSettlementAmount($grossSettlementAmount) 
    {
        $this->grossSettlementAmount = $grossSettlementAmount;
    }

    /**
     * @return mixed
     */
    public function getSettlementQuote()
    {
        return $this->settlementQuote;
    }

    /**
     * @param mixed $settlementQuote
     */
    public function setSettlementQuote($settlementQuote) 
    {
        $this->settlementQuote = $settlementQuote;
    }



}