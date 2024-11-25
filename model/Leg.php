<?php

namespace Model;

class Leg
{
    public $departureTime;
    public $arrivalTime;
    public $departureAddress;
    public $arrivalAddress;
    public $carrierName;
    public $carrierNo;
    public $classType;

    public $departureAirportCode;
    public $arrivalAirportCode;

    /**
     * @return mixed
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param mixed $departureTime
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @param mixed $arrivalTime
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return mixed
     */
    public function getDepartureAddress()
    {
        return $this->departureAddress;
    }

    /**
     * @param mixed $departureAddress
     */
    public function setDepartureAddress($departureAddress)
    {
        $this->departureAddress = $departureAddress;
    }

    /**
     * @return mixed
     */
    public function getArrivalAddress()
    {
        return $this->arrivalAddress;
    }

    /**
     * @param mixed $arrivalAddress
     */
    public function setArrivalAddress($arrivalAddress)
    {
        $this->arrivalAddress = $arrivalAddress;
    }

    /**
     * @return mixed
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param mixed $carrierName
     */
    public function setCarrierName($carrierName)
    {
        $this->carrierName = $carrierName;
    }

    /**
     * @return mixed
     */
    public function getCarrierNo()
    {
        return $this->carrierNo;
    }

    /**
     * @param mixed $carrierNo
     */
    public function setCarrierNo($carrierNo)
    {
        $this->carrierNo = $carrierNo;
    }

    /**
     * @return mixed
     */
    public function getClassType()
    {
        return $this->classType;
    }

    /**
     * @param mixed $classType
     */
    public function setClassType($classType)
    {
        $this->classType = $classType;
    }

    /**
     * @return mixed
     */
    public function getDepartureAirportCode()
    {
        return $this->departureAirportCode;
    }

    /**
     * @param mixed $departureAirportCode
     */
    public function setDepartureAirportCode($departureAirportCode)
    {
        $this->departureAirportCode = $departureAirportCode;
    }

    /**
     * @return mixed
     */
    public function getArrivalAirportCode()
    {
        return $this->arrivalAirportCode;
    }

    /**
     * @param mixed $arrivalAirportCode
     */
    public function setArrivalAirportCode($arrivalAirportCode)
    {
        $this->arrivalAirportCode = $arrivalAirportCode;
    }



}