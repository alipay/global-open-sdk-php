<?php

namespace Model;

class Passenger
{
    public $passengerName;
    public $passengerEmail;
    public $passengerPhoneNo;

    public $passengerId;
    public $passengerIdType;
    public $passengerCode;

    /**
     * @return mixed
     */
    public function getPassengerName()
    {
        return $this->passengerName;
    }

    /**
     * @param mixed $passengerName
     */
    public function setPassengerName($passengerName)
    {
        $this->passengerName = $passengerName;
    }

    /**
     * @return mixed
     */
    public function getPassengerEmail()
    {
        return $this->passengerEmail;
    }

    /**
     * @param mixed $passengerEmail
     */
    public function setPassengerEmail($passengerEmail)
    {
        $this->passengerEmail = $passengerEmail;
    }

    /**
     * @return mixed
     */
    public function getPassengerPhoneNo()
    {
        return $this->passengerPhoneNo;
    }

    /**
     * @param mixed $passengerPhoneNo
     */
    public function setPassengerPhoneNo($passengerPhoneNo)
    {
        $this->passengerPhoneNo = $passengerPhoneNo;
    }

    /**
     * @return mixed
     */
    public function getPassengerId()
    {
        return $this->passengerId;
    }

    /**
     * @param mixed $passengerId
     */
    public function setPassengerId($passengerId)
    {
        $this->passengerId = $passengerId;
    }

    /**
     * @return mixed
     */
    public function getPassengerIdType()
    {
        return $this->passengerIdType;
    }

    /**
     * @param mixed $passengerIdType
     */
    public function setPassengerIdType($passengerIdType)
    {
        $this->passengerIdType = $passengerIdType;
    }

    /**
     * @return mixed
     */
    public function getPassengerCode()
    {
        return $this->passengerCode;
    }

    /**
     * @param mixed $passengerCode
     */
    public function setPassengerCode($passengerCode)
    {
        $this->passengerCode = $passengerCode;
    }




}