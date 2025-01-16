<?php

namespace Model;

class Discount
{
    public $discountTag;
    public $discountName;
    public $savingsAmount;
    public $estimateSavingsAmount;

    /**
     * @return mixed
     */
    public function getDiscountTag()
    {
        return $this->discountTag;
    }

    /**
     * @param mixed $discountTag
     */
    public function setDiscountTag($discountTag)
    {
        $this->discountTag = $discountTag;
    }

    /**
     * @return mixed
     */
    public function getDiscountName()
    {
        return $this->discountName;
    }

    /**
     * @param mixed $discountName
     */
    public function setDiscountName($discountName)
    {
        $this->discountName = $discountName;
    }

    /**
     * @return mixed
     */
    public function getSavingsAmount()
    {
        return $this->savingsAmount;
    }

    /**
     * @param mixed $savingsAmount
     */
    public function setSavingsAmount($savingsAmount)
    {
        $this->savingsAmount = $savingsAmount;
    }

    /**
     * @return mixed
     */
    public function getEstimateSavingsAmount()
    {
        return $this->estimateSavingsAmount;
    }

    /**
     * @param mixed $estimateSavingsAmount
     */
    public function setEstimateSavingsAmount($estimateSavingsAmount)
    {
        $this->estimateSavingsAmount = $estimateSavingsAmount;
    }



}