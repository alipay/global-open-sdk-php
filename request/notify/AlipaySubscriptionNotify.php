<?php

namespace Request\notify;

class AlipaySubscriptionNotify extends \Request\notify\AlipayNotify
{
    public  $subscriptionRequestId;
    public  $subscriptionId;
    public  $subscriptionStatus ;
    public  $subscriptionNotificationType;
    public  $subscriptionStartTime;
    public  $subscriptionEndTime;
    public  $periodRule;

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
    public function getSubscriptionStatus()
    {
        return $this->subscriptionStatus;
    }

    /**
     * @param mixed $subscriptionStatus
     */
    public function setSubscriptionStatus($subscriptionStatus) 
    {
        $this->subscriptionStatus = $subscriptionStatus;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionNotificationType()
    {
        return $this->subscriptionNotificationType;
    }

    /**
     * @param mixed $subscriptionNotificationType
     */
    public function setSubscriptionNotificationType($subscriptionNotificationType) 
    {
        $this->subscriptionNotificationType = $subscriptionNotificationType;
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


}