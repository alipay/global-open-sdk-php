<?php

namespace Model;


class Trial
{

    public $trialStartPeriod;

    public $trialAmount;

    public $trialEndPeriod;

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
    public function setTrialStartPeriod($trialStartPeriod)
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
    public function setTrialAmount($trialAmount) 
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
    public function setTrialEndPeriod($trialEndPeriod) 
    {
        $this->trialEndPeriod = $trialEndPeriod;
    }


}