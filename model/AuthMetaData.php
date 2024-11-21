<?php

namespace Model;

class AuthMetaData
{
    public $accountHolderName;
    public $accountHolderCertNo;

    /**
     * @return mixed
     */
    public function getAccountHolderName()
    {
        return $this->accountHolderName;
    }

    /**
     * @param mixed $accountHolderName
     */
    public function setAccountHolderName($accountHolderName) 
    {
        $this->accountHolderName = $accountHolderName;
    }

    /**
     * @return mixed
     */
    public function getAccountHolderCertNo()
    {
        return $this->accountHolderCertNo;
    }

    /**
     * @param mixed $accountHolderCertNo
     */
    public function setAccountHolderCertNo($accountHolderCertNo) 
    {
        $this->accountHolderCertNo = $accountHolderCertNo;
    }


}