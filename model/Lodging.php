<?php

namespace Model;

class Lodging
{
    public $hotelName;
    public $hotelAddress;
    public $checkInDate;
    public $checkOutDate;
    public $numberOfNights;
    public $numberOfRooms;
    public $guestNames;

    /**
     * @return mixed
     */
    public function getHotelName()
    {
        return $this->hotelName;
    }

    /**
     * @param mixed $hotelName
     */
    public function setHotelName($hotelName) 
    {
        $this->hotelName = $hotelName;
    }

    /**
     * @return mixed
     */
    public function getHotelAddress()
    {
        return $this->hotelAddress;
    }

    /**
     * @param mixed $hotelAddress
     */
    public function setHotelAddress($hotelAddress) 
    {
        $this->hotelAddress = $hotelAddress;
    }

    /**
     * @return mixed
     */
    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    /**
     * @param mixed $checkInDate
     */
    public function setCheckInDate($checkInDate) 
    {
        $this->checkInDate = $checkInDate;
    }

    /**
     * @return mixed
     */
    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    /**
     * @param mixed $checkOutDate
     */
    public function setCheckOutDate($checkOutDate) 
    {
        $this->checkOutDate = $checkOutDate;
    }

    /**
     * @return mixed
     */
    public function getNumberOfNights()
    {
        return $this->numberOfNights;
    }

    /**
     * @param mixed $numberOfNights
     */
    public function setNumberOfNights($numberOfNights) 
    {
        $this->numberOfNights = $numberOfNights;
    }

    /**
     * @return mixed
     */
    public function getNumberOfRooms()
    {
        return $this->numberOfRooms;
    }

    /**
     * @param mixed $numberOfRooms
     */
    public function setNumberOfRooms($numberOfRooms) 
    {
        $this->numberOfRooms = $numberOfRooms;
    }

    /**
     * @return mixed
     */
    public function getGuestNames()
    {
        return $this->guestNames;
    }

    /**
     * @param mixed $guestNames
     */
    public function setGuestNames($guestNames) 
    {
        $this->guestNames = $guestNames;
    }


}