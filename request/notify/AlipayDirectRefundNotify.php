<?php

namespace Request\notify;

class AlipayDirectRefundNotify extends \Request\notify\AlipayNotify
{
    public $refundStatus;

    public $refundId;

    public $paymentId;

    public $refundRequestId;

    public $refundTime;

    public $refundFromMethod;



    public $refundToAmount;

    public $refundFromAmount;

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
    public function setRefundStatus($refundStatus): void
    {
        $this->refundStatus = $refundStatus;
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
    public function setRefundId($refundId): void
    {
        $this->refundId = $refundId;
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
    public function getRefundRequestId()
    {
        return $this->refundRequestId;
    }

    /**
     * @param mixed $refundRequestId
     */
    public function setRefundRequestId($refundRequestId): void
    {
        $this->refundRequestId = $refundRequestId;
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
    public function setRefundTime($refundTime): void
    {
        $this->refundTime = $refundTime;
    }

    /**
     * @return \Model\RefundFromMethod
     */
    public function getRefundFromMethod()
    {
        return $this->refundFromMethod;
    }

    /**
     * @param \Model\RefundFromMethod $refundFromMethod
     */
    public function setRefundFromMethod($refundFromMethod): void
    {
        $this->refundFromMethod = $refundFromMethod;
    }

    /**
     * @return mixed
     */
    public function getRefundFromMethodType()
    {
        return $this->refundFromMethodType;
    }

    /**
     * @param mixed $refundFromMethodType
     */
    public function setRefundFromMethodType($refundFromMethodType): void
    {
        $this->refundFromMethodType = $refundFromMethodType;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * @return \Model\Amount
     */
    public function getRefundToAmount()
    {
        return $this->refundToAmount;
    }

    /**
     * @param \Model\Amount $refundToAmount
     */
    public function setRefundToAmount($refundToAmount): void
    {
        $this->refundToAmount = $refundToAmount;
    }

    /**
     * @return \Model\Amount
     */
    public function getRefundFromAmount()
    {
        return $this->refundFromAmount;
    }

    /**
     * @param \Model\Amount $refundFromAmount
     */
    public function setRefundFromAmount($refundFromAmount): void
    {
        $this->refundFromAmount = $refundFromAmount;
    }
}
