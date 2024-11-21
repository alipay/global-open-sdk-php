<?php

namespace Request\notify;

class AlipaySubscriptionPayNotify  extends \Request\notify\AlipayPayResultNotify
{
    public  $subscriptionRequestId;
    public  $subscriptionId;
    public  $periodStartTime;
    public  $periodEndTime;
    public  $phaseNo;

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
    public function getPeriodStartTime()
    {
        return $this->periodStartTime;
    }

    /**
     * @param mixed $periodStartTime
     */
    public function setPeriodStartTime($periodStartTime) 
    {
        $this->periodStartTime = $periodStartTime;
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
    public function setPeriodEndTime($periodEndTime) 
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
    public function setPhaseNo($phaseNo) 
    {
        $this->phaseNo = $phaseNo;
    }


}