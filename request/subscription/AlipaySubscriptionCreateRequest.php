<?php

namespace Request\subscription;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipaySubscriptionCreateRequest extends AlipayRequest
{

    /**
     * The unique ID assigned by a merchant to identify a subscription request. Alipay uses this field for idempotency control.
     */
    public $subscriptionRequestId;

    /**
     * The description of the subscription, used for displaying user consumption records and other actions.
     */
    public $subscriptionDescription;

    /**
     * The merchant page URL that the user is redirected to after authorizing the subscription.
     */
    public $subscriptionRedirectUrl;

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
     * The payment method that is used to collect the payment by the merchant or acquirer.
     */
    public $paymentMethod;

    /**
     * The URL that is used to receive the subscription result notification.
     */
    public $subscriptionNotificationUrl;

    /**
     * The URL that is used to receive the subscription result notification.
     */
    public $paymentNotificationUrl;

    /**
     * The order information for the subscription.
     */
    public $orderInfo;

    /**
     * The payment amount charged to the user per subscription period.
     */
    public $paymentAmount;

    /**
     * The settlement strategy for the payment request.
     */
    public $settlementStrategy;

    /**
     * Information about the environment where the order is placed, such as the device information.
     */
    public $env;

    /**
     * The list of trial information of a subscription.
     */
    public $trials;

    function __construct()
    {
        $this->setPath(AntomPathConstants::SUBSCRIPTION_CREATE_PATH);
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
    public function setSubscriptionRequestId($subscriptionRequestId) 
    {
        $this->subscriptionRequestId = $subscriptionRequestId;
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
    public function getSubscriptionRedirectUrl()
    {
        return $this->subscriptionRedirectUrl;
    }

    /**
     * @param mixed $subscriptionRedirectUrl
     */
    public function setSubscriptionRedirectUrl($subscriptionRedirectUrl) 
    {
        $this->subscriptionRedirectUrl = $subscriptionRedirectUrl;
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
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod) 
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionNotificationUrl()
    {
        return $this->subscriptionNotificationUrl;
    }

    /**
     * @param mixed $subscriptionNotificationUrl
     */
    public function setSubscriptionNotificationUrl($subscriptionNotificationUrl) 
    {
        $this->subscriptionNotificationUrl = $subscriptionNotificationUrl;
    }

    /**
     * @return mixed
     */
    public function getPaymentNotificationUrl()
    {
        return $this->paymentNotificationUrl;
    }

    /**
     * @param mixed $paymentNotificationUrl
     */
    public function setPaymentNotificationUrl($paymentNotificationUrl) 
    {
        $this->paymentNotificationUrl = $paymentNotificationUrl;
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
    public function getSettlementStrategy()
    {
        return $this->settlementStrategy;
    }

    /**
     * @param mixed $settlementStrategy
     */
    public function setSettlementStrategy($settlementStrategy) 
    {
        $this->settlementStrategy = $settlementStrategy;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     */
    public function setEnv($env) 
    {
        $this->env = $env;
    }

    /**
     * @return mixed
     */
    public function getTrials()
    {
        return $this->trials;
    }

    /**
     * @param mixed $trials
     */
    public function setTrials($trials) 
    {
        $this->trials = $trials;
    }


}