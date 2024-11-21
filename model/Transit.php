<?php

namespace Model;

class Transit
{

    public $transitType;
    public $legs;
    public $passengers;

    /**
     * @return mixed
     */
    public function getTransitType()
    {
        return $this->transitType;
    }

    /**
     * @param mixed $transitType
     */
    public function setTransitType($transitType) 
    {
        $this->transitType = $transitType;
    }

    /**
     * @return mixed
     */
    public function getLegs()
    {
        return $this->legs;
    }

    /**
     * @param mixed $legs
     */
    public function setLegs($legs) 
    {
        $this->legs = $legs;
    }

    /**
     * @return mixed
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * @param mixed $passengers
     */
    public function setPassengers($passengers) 
    {
        $this->passengers = $passengers;
    }


}