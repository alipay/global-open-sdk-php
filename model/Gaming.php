<?php

namespace Model;

class Gaming
{
    public $gameName;
    public $toppedUpUser;
    public $toppedUpEmail;
    public $toppedUpPhoneNo;

    /**
     * @return mixed
     */
    public function getGameName()
    {
        return $this->gameName;
    }

    /**
     * @param mixed $gameName
     */
    public function setGameName($gameName): void
    {
        $this->gameName = $gameName;
    }

    /**
     * @return mixed
     */
    public function getToppedUpUser()
    {
        return $this->toppedUpUser;
    }

    /**
     * @param mixed $toppedUpUser
     */
    public function setToppedUpUser($toppedUpUser): void
    {
        $this->toppedUpUser = $toppedUpUser;
    }

    /**
     * @return mixed
     */
    public function getToppedUpEmail()
    {
        return $this->toppedUpEmail;
    }

    /**
     * @param mixed $toppedUpEmail
     */
    public function setToppedUpEmail($toppedUpEmail): void
    {
        $this->toppedUpEmail = $toppedUpEmail;
    }

    /**
     * @return mixed
     */
    public function getToppedUpPhoneNo()
    {
        return $this->toppedUpPhoneNo;
    }

    /**
     * @param mixed $toppedUpPhoneNo
     */
    public function setToppedUpPhoneNo($toppedUpPhoneNo): void
    {
        $this->toppedUpPhoneNo = $toppedUpPhoneNo;
    }



}