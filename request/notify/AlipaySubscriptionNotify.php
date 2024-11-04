<?php

namespace Request\notify;

class AlipaySubscriptionNotify extends AlipayNotify
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
    public function setSubscriptionRequestId($subscriptionRequestId): void
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
    public function setSubscriptionId($subscriptionId): void
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
    public function setSubscriptionStatus($subscriptionStatus): void
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
    public function setSubscriptionNotificationType($subscriptionNotificationType): void
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
    public function setSubscriptionStartTime($subscriptionStartTime): void
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
    public function setSubscriptionEndTime($subscriptionEndTime): void
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
    public function setPeriodRule($periodRule): void
    {
        $this->periodRule = $periodRule;
    }


}