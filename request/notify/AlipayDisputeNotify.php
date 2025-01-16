<?php

namespace Request\notify;


class AlipayDisputeNotify extends \Request\notify\AlipayNotify
{
    public  $paymentRequestId;
    public  $disputeId;
    public  $paymentId;
    public  $disputeTime;
    public  $disputeAmount;
    public  $disputeNotificationType;
    public  $disputeReasonMsg;
    public  $disputeJudgedTime;
    public  $disputeJudgedAmount;
    public  $disputeJudgedResult;
    public  $defenseDueTime;
    public  $disputeReasonCode;
    public  $disputeSource;
    public  $arn;
    public  $disputeAcceptReason;
    public  $disputeAcceptTime;

    public $disputeType;

    public $defendable;

    /**
     * @return mixed
     */
    public function getDefendable()
    {
        return $this->defendable;
    }

    /**
     * @param mixed $defendable
     */
    public function setDefendable($defendable)
    {
        $this->defendable = $defendable;
    }



    /**
     * @return mixed
     */
    public function getDisputeType()
    {
        return $this->disputeType;
    }

    /**
     * @param mixed $disputeType
     */
    public function setDisputeType($disputeType)
    {
        $this->disputeType = $disputeType;
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
    public function getDisputeId()
    {
        return $this->disputeId;
    }

    /**
     * @param mixed $disputeId
     */
    public function setDisputeId($disputeId)
    {
        $this->disputeId = $disputeId;
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
    public function getDisputeTime()
    {
        return $this->disputeTime;
    }

    /**
     * @param mixed $disputeTime
     */
    public function setDisputeTime($disputeTime)
    {
        $this->disputeTime = $disputeTime;
    }

    /**
     * @return mixed
     */
    public function getDisputeAmount()
    {
        return $this->disputeAmount;
    }

    /**
     * @param mixed $disputeAmount
     */
    public function setDisputeAmount($disputeAmount)
    {
        $this->disputeAmount = $disputeAmount;
    }

    /**
     * @return mixed
     */
    public function getDisputeNotificationType()
    {
        return $this->disputeNotificationType;
    }

    /**
     * @param mixed $disputeNotificationType
     */
    public function setDisputeNotificationType($disputeNotificationType)
    {
        $this->disputeNotificationType = $disputeNotificationType;
    }

    /**
     * @return mixed
     */
    public function getDisputeReasonMsg()
    {
        return $this->disputeReasonMsg;
    }

    /**
     * @param mixed $disputeReasonMsg
     */
    public function setDisputeReasonMsg($disputeReasonMsg)
    {
        $this->disputeReasonMsg = $disputeReasonMsg;
    }

    /**
     * @return mixed
     */
    public function getDisputeJudgedTime()
    {
        return $this->disputeJudgedTime;
    }

    /**
     * @param mixed $disputeJudgedTime
     */
    public function setDisputeJudgedTime($disputeJudgedTime)
    {
        $this->disputeJudgedTime = $disputeJudgedTime;
    }

    /**
     * @return mixed
     */
    public function getDisputeJudgedAmount()
    {
        return $this->disputeJudgedAmount;
    }

    /**
     * @param mixed $disputeJudgedAmount
     */
    public function setDisputeJudgedAmount($disputeJudgedAmount)
    {
        $this->disputeJudgedAmount = $disputeJudgedAmount;
    }

    /**
     * @return mixed
     */
    public function getDisputeJudgedResult()
    {
        return $this->disputeJudgedResult;
    }

    /**
     * @param mixed $disputeJudgedResult
     */
    public function setDisputeJudgedResult($disputeJudgedResult)
    {
        $this->disputeJudgedResult = $disputeJudgedResult;
    }

    /**
     * @return mixed
     */
    public function getDefenseDueTime()
    {
        return $this->defenseDueTime;
    }

    /**
     * @param mixed $defenseDueTime
     */
    public function setDefenseDueTime($defenseDueTime)
    {
        $this->defenseDueTime = $defenseDueTime;
    }

    /**
     * @return mixed
     */
    public function getDisputeReasonCode()
    {
        return $this->disputeReasonCode;
    }

    /**
     * @param mixed $disputeReasonCode
     */
    public function setDisputeReasonCode($disputeReasonCode)
    {
        $this->disputeReasonCode = $disputeReasonCode;
    }

    /**
     * @return mixed
     */
    public function getDisputeSource()
    {
        return $this->disputeSource;
    }

    /**
     * @param mixed $disputeSource
     */
    public function setDisputeSource($disputeSource)
    {
        $this->disputeSource = $disputeSource;
    }

    /**
     * @return mixed
     */
    public function getArn()
    {
        return $this->arn;
    }

    /**
     * @param mixed $arn
     */
    public function setArn($arn)
    {
        $this->arn = $arn;
    }

    /**
     * @return mixed
     */
    public function getDisputeAcceptReason()
    {
        return $this->disputeAcceptReason;
    }

    /**
     * @param mixed $disputeAcceptReason
     */
    public function setDisputeAcceptReason($disputeAcceptReason)
    {
        $this->disputeAcceptReason = $disputeAcceptReason;
    }

    /**
     * @return mixed
     */
    public function getDisputeAcceptTime()
    {
        return $this->disputeAcceptTime;
    }

    /**
     * @param mixed $disputeAcceptTime
     */
    public function setDisputeAcceptTime($disputeAcceptTime)
    {
        $this->disputeAcceptTime = $disputeAcceptTime;
    }



}