<?php

namespace Request\subscription;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipaySubscriptionUpdateRequest extends AlipayRequest
{

    public  $subscriptionUpdateRequestId;
    public  $subscriptionId;
    public  $subscriptionDescription;
    public  $periodRule;

    public  $paymentAmount;
    public  $subscriptionEndTime;
    public  $orderInfo;


    function __construct()
    {
        $this->setPath(AntomPathConstants::SUBSCRIPTION_UPDATE_PATH);
    }


    /**
     * @return mixed
     */
    public function getSubscriptionUpdateRequestId()
    {
        return $this->subscriptionUpdateRequestId;
    }

    /**
     * @param mixed $subscriptionUpdateRequestId
     */
    public function setSubscriptionUpdateRequestId($subscriptionUpdateRequestId)
    {
        $this->subscriptionUpdateRequestId = $subscriptionUpdateRequestId;
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
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionDescription()
    {
        return $this->subscriptionDescription;
    }

    /**
     * @param mixed $subscriptionDescription
     */
    public function setSubscriptionDescription($subscriptionDescription)
    {
        $this->subscriptionDescription = $subscriptionDescription;
    }

    /**
     * @return mixed
     */
    public function getPeriodRule()
    {
        return $this->periodRule;
    }

    /**
     * @param mixed $periodRule
     */
    public function setPeriodRule($periodRule)
    {
        $this->periodRule = $periodRule;
    }

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
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionEndTime()
    {
        return $this->subscriptionEndTime;
    }

    /**
     * @param mixed $subscriptionEndTime
     */
    public function setSubscriptionEndTime($subscriptionEndTime)
    {
        $this->subscriptionEndTime = $subscriptionEndTime;
    }

    /**
     * @return mixed
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }

    /**
     * @param mixed $orderInfo
     */
    public function setOrderInfo($orderInfo)
    {
        $this->orderInfo = $orderInfo;
    }




}