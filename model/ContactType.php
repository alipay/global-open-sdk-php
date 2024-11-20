<?php

namespace Model;

class ContactType
{
    public $EMAIL;
    public $PHONE_NO;
    public $COMMERCIAL_PHONE_NO;

    /**
     * @return mixed
     */
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    /**
     * @param mixed $EMAIL
     */
    public function setEMAIL($EMAIL) 
    {
        $this->EMAIL = $EMAIL;
    }

    /**
     * @return mixed
     */
    public function getPHONENO()
    {
        return $this->PHONE_NO;
    }

    /**
     * @param mixed $PHONE_NO
     */
    public function setPHONENO($PHONE_NO) 
    {
        $this->PHONE_NO = $PHONE_NO;
    }

    /**
     * @return mixed
     */
    public function getCOMMERCIALPHONENO()
    {
        return $this->COMMERCIAL_PHONE_NO;
    }

    /**
     * @param mixed $COMMERCIAL_PHONE_NO
     */
    public function setCOMMERCIALPHONENO($COMMERCIAL_PHONE_NO) 
    {
        $this->COMMERCIAL_PHONE_NO = $COMMERCIAL_PHONE_NO;
    }


}