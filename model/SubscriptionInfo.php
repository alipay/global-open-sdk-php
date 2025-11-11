<?php

namespace Model;

class SubscriptionInfo
{

    public $subscriptionDescription;
    public $subscriptionStartTime;
    public $subscriptionEndTime;
    public $periodRule;
    public $trials;
    public $subscriptionNotifyUrl;
    public $subscriptionExpiryTime;

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

    /**
     * @return mixed
     */
    public function getSubscriptionNotifyUrl()
    {
        return $this->subscriptionNotifyUrl;
    }

    /**
     * @param mixed $subscriptionNotifyUrl
     */
    public function setSubscriptionNotifyUrl($subscriptionNotifyUrl)
    {
        $this->subscriptionNotifyUrl = $subscriptionNotifyUrl;
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





}