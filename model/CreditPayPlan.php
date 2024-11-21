<?php

namespace Model;

class CreditPayPlan
{

    public $installmentNum;
    public $interval;
    public $creditPayFeeType;
    public $feePercentage;

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param mixed $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }



    /**
     * @return mixed
     */
    public function getInstallmentNum()
    {
        return $this->installmentNum;
    }

    /**
     * @param mixed $installmentNum
     */
    public function setInstallmentNum($installmentNum)
    {
        $this->installmentNum = $installmentNum;
    }

    /**
     * @return mixed
     */
    public function getCreditPayFeeType()
    {
        return $this->creditPayFeeType;
    }

    /**
     * @param mixed $creditPayFeeType
     */
    public function setCreditPayFeeType($creditPayFeeType)
    {
        $this->creditPayFeeType = $creditPayFeeType;
    }

    /**
     * @return mixed
     */
    public function getFeePercentage()
    {
        return $this->feePercentage;
    }

    /**
     * @param mixed $feePercentage
     */
    public function setFeePercentage($feePercentage)
    {
        $this->feePercentage = $feePercentage;
    }

}