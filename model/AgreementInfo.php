<?php

namespace Model;

class AgreementInfo
{

    public $authState;


    public $userLoginId;


    public $userLoginType;


    public $displayUserLoginId;



    /**
     * @return mixed
     */
    public function getAuthState()
    {
        return $this->authState;
    }

    /**
     * @param mixed $authState
     */
    public function setAuthState($authState)
    {
        $this->authState = $authState;
    }

    /**
     * @return mixed
     */
    public function getUserLoginId()
    {
        return $this->userLoginId;
    }

    /**
     * @param mixed $userLoginId
     */
    public function setUserLoginId($userLoginId)
    {
        $this->userLoginId = $userLoginId;
    }

    /**
     * @return mixed
     */
    public function getUserLoginType()
    {
        return $this->userLoginType;
    }

    /**
     * @param mixed $userLoginType
     */
    public function setUserLoginType($userLoginType)
    {
        $this->userLoginType = $userLoginType;
    }

    /**
     * @return mixed
     */
    public function getDisplayUserLoginId()
    {
        return $this->displayUserLoginId;
    }

    /**
     * @param mixed $displayUserLoginId
     */
    public function setDisplayUserLoginId($displayUserLoginId)
    {
        $this->displayUserLoginId = $displayUserLoginId;
    }




}