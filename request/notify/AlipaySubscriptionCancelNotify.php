<?php

namespace Request\notify;

class AlipaySubscriptionCancelNotify  extends \Request\notify\AlipayNotify
{
    public $paymentAmount;
    public $paymentCreateTime;
    public $paymentTime;
    public $periodEndTime;
    public $phaseNo;
    public $subscriptionId;
    public $subscriptionOrderId;
    public $subscriptionOrderStatus;
    public $subscriptionRequestId;
    public $subscriptionTransId;

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount): void
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentCreateTime()
    {
        return $this->paymentCreateTime;
    }

    /**
     * @param mixed $paymentCreateTime
     */
    public function setPaymentCreateTime($paymentCreateTime): void
    {
        $this->paymentCreateTime = $paymentCreateTime;
    }

    /**
     * @return mixed
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * @param mixed $paymentTime
     */
    public function setPaymentTime($paymentTime): void
    {
        $this->paymentTime = $paymentTime;
    }

    /**
     * @return mixed
     */
    public function getPeriodEndTime()
    {
        return $this->periodEndTime;
    }

    /**
     * @param mixed $periodEndTime
     */
    public function setPeriodEndTime($periodEndTime): void
    {
        $this->periodEndTime = $periodEndTime;
    }

    /**
     * @return mixed
     */
    public function getPhaseNo()
    {
        return $this->phaseNo;
    }

    /**
     * @param mixed $phaseNo
     */
    public function setPhaseNo($phaseNo): void
    {
        $this->phaseNo = $phaseNo;
    }
    /**
     * @return mixed
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param mixed $subscriptionId
     */
    public function setSubscriptionId($subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionOrderId()
    {
        return $this->subscriptionOrderId;
    }

    /**
     * @param mixed $subscriptionOrderId
     */
    public function setSubscriptionOrderId($subscriptionOrderId): void
    {
        $this->subscriptionOrderId = $subscriptionOrderId;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionOrderStatus()
    {
        return $this->subscriptionOrderStatus;
    }

    /**
     * @param mixed $subscriptionOrderStatus
     */
    public function setSubscriptionOrderStatus($subscriptionOrderStatus): void
    {
        $this->subscriptionOrderStatus = $subscriptionOrderStatus;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionRequestId()
    {
        return $this->subscriptionRequestId;
    }

    /**
     * @param mixed $subscriptionRequestId
     */
    public function setSubscriptionRequestId($subscriptionRequestId): void
    {
        $this->subscriptionRequestId = $subscriptionRequestId;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionTransId()
    {
        return $this->subscriptionTransId;
    }

    /**
     * @param mixed $subscriptionTransId
     */
    public function setSubscriptionTransId($subscriptionTransId): void
    {
        $this->subscriptionTransId = $subscriptionTransId;
    }



}