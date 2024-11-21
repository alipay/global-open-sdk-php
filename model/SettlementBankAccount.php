<?php

namespace Model;

class SettlementBankAccount
{
    public $bankAccountNo;
    public $accountHolderName;
    public $swiftCode;
    public $bankRegion;
    public $accountHolderType;
    public $routingNumber;
    public $branchCode;
    public $accountHolderTIN;
    public $accountType;
    public $bankName;
    public $accountHolderAddress;
    public $iban;

    /**
     * @return mixed
     */
    public function getBankAccountNo()
    {
        return $this->bankAccountNo;
    }

    /**
     * @param mixed $bankAccountNo
     */
    public function setBankAccountNo($bankAccountNo) 
    {
        $this->bankAccountNo = $bankAccountNo;
    }

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
    public function getSwiftCode()
    {
        return $this->swiftCode;
    }

    /**
     * @param mixed $swiftCode
     */
    public function setSwiftCode($swiftCode) 
    {
        $this->swiftCode = $swiftCode;
    }

    /**
     * @return mixed
     */
    public function getBankRegion()
    {
        return $this->bankRegion;
    }

    /**
     * @param mixed $bankRegion
     */
    public function setBankRegion($bankRegion) 
    {
        $this->bankRegion = $bankRegion;
    }

    /**
     * @return mixed
     */
    public function getAccountHolderType()
    {
        return $this->accountHolderType;
    }

    /**
     * @param mixed $accountHolderType
     */
    public function setAccountHolderType($accountHolderType) 
    {
        $this->accountHolderType = $accountHolderType;
    }

    /**
     * @return mixed
     */
    public function getRoutingNumber()
    {
        return $this->routingNumber;
    }

    /**
     * @param mixed $routingNumber
     */
    public function setRoutingNumber($routingNumber) 
    {
        $this->routingNumber = $routingNumber;
    }

    /**
     * @return mixed
     */
    public function getBranchCode()
    {
        return $this->branchCode;
    }

    /**
     * @param mixed $branchCode
     */
    public function setBranchCode($branchCode) 
    {
        $this->branchCode = $branchCode;
    }

    /**
     * @return mixed
     */
    public function getAccountHolderTIN()
    {
        return $this->accountHolderTIN;
    }

    /**
     * @param mixed $accountHolderTIN
     */
    public function setAccountHolderTIN($accountHolderTIN) 
    {
        $this->accountHolderTIN = $accountHolderTIN;
    }

    /**
     * @return mixed
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param mixed $accountType
     */
    public function setAccountType($accountType) 
    {
        $this->accountType = $accountType;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param mixed $bankName
     */
    public function setBankName($bankName) 
    {
        $this->bankName = $bankName;
    }

    /**
     * @return mixed
     */
    public function getAccountHolderAddress()
    {
        return $this->accountHolderAddress;
    }

    /**
     * @param mixed $accountHolderAddress
     */
    public function setAccountHolderAddress($accountHolderAddress) 
    {
        $this->accountHolderAddress = $accountHolderAddress;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban) 
    {
        $this->iban = $iban;
    }


}