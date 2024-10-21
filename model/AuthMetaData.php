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
    public function setAccountHolderName($accountHolderName): void
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
    public function setAccountHolderCertNo($accountHolderCertNo): void
    {
        $this->accountHolderCertNo = $accountHolderCertNo;
    }


}