<?php

class Trial
{

    public  $trialStartPeriod;

    public  $trialAmount;

    public  $trialEndPeriod;

    /**
     * @return mixed
     */
    public function getTrialStartPeriod()
    {
        return $this->trialStartPeriod;
    }

    /**
     * @param mixed $trialStartPeriod
     */
    public function setTrialStartPeriod($trialStartPeriod): void
    {
        $this->trialStartPeriod = $trialStartPeriod;
    }

    /**
     * @return mixed
     */
    public function getTrialAmount()
    {
        return $this->trialAmount;
    }

    /**
     * @param mixed $trialAmount
     */
    public function setTrialAmount($trialAmount): void
    {
        $this->trialAmount = $trialAmount;
    }

    /**
     * @return mixed
     */
    public function getTrialEndPeriod()
    {
        return $this->trialEndPeriod;
    }

    /**
     * @param mixed $trialEndPeriod
     */
    public function setTrialEndPeriod($trialEndPeriod): void
    {
        $this->trialEndPeriod = $trialEndPeriod;
    }



}