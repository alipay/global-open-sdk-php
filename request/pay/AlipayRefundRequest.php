<?php


namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayRefundRequest extends AlipayRequest
{

    public $refundRequestId;
    public $paymentId;
    public $referenceRefundId;
    public $refundAmount;
    public $refundReason;
    public $refundNotifyUrl;
    public $isAsyncRefund;
    public $extendInfo;

    public $refundDetails;

    public $refundSourceAccountNo;


    function __construct()
    {
        $this->setPath(AntomPathConstants::REFUND_PATH);
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
    public function getRefundReason()
    {
        return $this->refundReason;
    }

    /**
     * @param mixed $refundReason
     */
    public function setRefundReason($refundReason)
    {
        $this->refundReason = $refundReason;
    }

    /**
     * @return mixed
     */
    public function getIsAsyncRefund()
    {
        return $this->isAsyncRefund;
    }

    /**
     * @param mixed $isAsyncRefund
     */
    public function setIsAsyncRefund($isAsyncRefund)
    {
        $this->isAsyncRefund = $isAsyncRefund;
    }

    /**
     * @return mixed
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param mixed $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }

    /**
     * @return mixed
     */
    public function getRefundNotifyUrl()
    {
        return $this->refundNotifyUrl;
    }

    /**
     * @param mixed $refundNotifyUrl
     */
    public function setRefundNotifyUrl($refundNotifyUrl)
    {
        $this->refundNotifyUrl = $refundNotifyUrl;
    }

    /**
     * @return mixed
     */
    public function getRefundDetails()
    {
        return $this->refundDetails;
    }

    /**
     * @param mixed $refundDetails
     */
    public function setRefundDetails($refundDetails)
    {
        $this->refundDetails = $refundDetails;
    }

    /**
     * @return mixed
     */
    public function getRefundSourceAccountNo()
    {
        return $this->refundSourceAccountNo;
    }

    /**
     * @param mixed $refundSourceAccountNo
     */
    public function setRefundSourceAccountNo($refundSourceAccountNo)
    {
        $this->refundSourceAccountNo = $refundSourceAccountNo;
    }


}