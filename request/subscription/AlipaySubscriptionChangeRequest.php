<?php

namespace Request\subscription;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipaySubscriptionChangeRequest extends AlipayRequest
{
    /**
     * The unique ID assigned by a merchant to identify a subscription change request. Alipay uses this field for idempotency control.
     */
    public $subscriptionChangeRequestId;

    /**
     * The unique ID assigned by Alipay to identify a subscription.
     */
    public $subscriptionId;

    /**
     * The description of the subscription, used for displaying user consumption records and other actions.
     */
    public $subscriptionDescription;

    /**
     * The date and time when the subscription becomes active.
     */
    public $subscriptionStartTime;

    /**
     * The date and time when the subscription ends.
     */
    public $subscriptionEndTime;

    /**
     * The subscription period rule, used to define a subscription's billing period.
     */
    public $periodRule;

    /**
     * A specific date and time after which the created subscription expires.
     */
    public $subscriptionExpiryTime;

    /**
     * The order information of the subscription.
     */
    public $orderInfo;

    /**
     * The payment amount charged to the user per subscription period.
     */
    public $paymentAmount;

    /**
     * The payment amount for the initial subscription period after changing the payment amount for subsequent subscription periods.
     */
    public $paymentAmountDifference;


    function __construct()
    {
        $this->setPath(AntomPathConstants::SUBSCRIPTION_CHANGE_PATH);
    }


    /**
     * @return mixed
     */
    public function getSubscriptionChangeRequestId()
    {
        return $this->subscriptionChangeRequestId;
    }

    /**
     * @param mixed $subscriptionChangeRequestId
     */
    public function setSubscriptionChangeRequestId($subscriptionChangeRequestId) 
    {
        $this->subscriptionChangeRequestId = $subscriptionChangeRequestId;
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
    public function getSubscriptionStartTime()
    {
        return $this->subscriptionStartTime;
    }

    /**
     * @param mixed $subscriptionStartTime
     */
    public function setSubscriptionStartTime($subscriptionStartTime) 
    {
        $this->subscriptionStartTime = $subscriptionStartTime;
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
    public function getSubscriptionExpiryTime()
    {
        return $this->subscriptionExpiryTime;
    }

    /**
     * @param mixed $subscriptionExpiryTime
     */
    public function setSubscriptionExpiryTime($subscriptionExpiryTime) 
    {
        $this->subscriptionExpiryTime = $subscriptionExpiryTime;
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
    public function getPaymentAmountDifference()
    {
        return $this->paymentAmountDifference;
    }

    /**
     * @param mixed $paymentAmountDifference
     */
    public function setPaymentAmountDifference($paymentAmountDifference) 
    {
        $this->paymentAmountDifference = $paymentAmountDifference;
    }


}