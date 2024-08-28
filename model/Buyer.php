<?php

namespace Model;

class Buyer
{

    public $referenceBuyerId;
    public $buyerName;
    public $buyerPhoneNo;
    public $buyerEmail;

    public $buyerRegistrationTime;

    public $isAccountVerified;

    public $successfulOrderCount;

    /**
     * @return String
     */
    public function getReferenceBuyerId()
    {
        return $this->referenceBuyerId;
    }

    /**
     * @param String $referenceBuyerId
     */
    public function setReferenceBuyerId($referenceBuyerId)
    {
        $this->referenceBuyerId = $referenceBuyerId;
    }

    /**
     * @return UserName
     */
    public function getBuyerName()
    {
        return $this->buyerName;
    }

    /**
     * @param UserName $buyerName
     */
    public function setBuyerName($buyerName)
    {
        $this->buyerName = $buyerName;
    }

    /**
     * @return String
     */
    public function getBuyerPhoneNo()
    {
        return $this->buyerPhoneNo;
    }

    /**
     * @param String $buyerPhoneNo
     */
    public function setBuyerPhoneNo($buyerPhoneNo)
    {
        $this->buyerPhoneNo = $buyerPhoneNo;
    }

    /**
     * @return String
     */
    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    /**
     * @param String $buyerEmail
     */
    public function setBuyerEmail($buyerEmail)
    {
        $this->buyerEmail = $buyerEmail;
    }

    /**
     * @return mixed
     */
    public function getBuyerRegistrationTime()
    {
        return $this->buyerRegistrationTime;
    }

    /**
     * @param mixed $buyerRegistrationTime
     */
    public function setBuyerRegistrationTime($buyerRegistrationTime)
    {
        $this->buyerRegistrationTime = $buyerRegistrationTime;
    }

    /**
     * @return mixed
     */
    public function getIsAccountVerified()
    {
        return $this->isAccountVerified;
    }

    /**
     * @param mixed $isAccountVerified
     */
    public function setIsAccountVerified($isAccountVerified)
    {
        $this->isAccountVerified = $isAccountVerified;
    }

    /**
     * @return mixed
     */
    public function getSuccessfulOrderCount()
    {
        return $this->successfulOrderCount;
    }

    /**
     * @param mixed $successfulOrderCount
     */
    public function setSuccessfulOrderCount($successfulOrderCount)
    {
        $this->successfulOrderCount = $successfulOrderCount;
    }


}