<?php

namespace Model;

class TransferToDetail
{
    public $transferToMethod;
    public $transferToCurrency;
    public $feeAmount;
    public $actualTransferToAmount;
    public $purposeCode;
    public $transferNotifyUrl;
    public $transferRemark;

    /**
     * @return mixed
     */
    public function getTransferToMethod()
    {
        return $this->transferToMethod;
    }

    /**
     * @param mixed $transferToMethod
     */
    public function setTransferToMethod($transferToMethod) 
    {
        $this->transferToMethod = $transferToMethod;
    }



    /**
     * @return mixed
     */
    public function getTransferToCurrency()
    {
        return $this->transferToCurrency;
    }

    /**
     * @param mixed $transferToCurrency
     */
    public function setTransferToCurrency($transferToCurrency) 
    {
        $this->transferToCurrency = $transferToCurrency;
    }

    /**
     * @return mixed
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * @param mixed $feeAmount
     */
    public function setFeeAmount($feeAmount) 
    {
        $this->feeAmount = $feeAmount;
    }

    /**
     * @return mixed
     */
    public function getActualTransferToAmount()
    {
        return $this->actualTransferToAmount;
    }

    /**
     * @param mixed $actualTransferToAmount
     */
    public function setActualTransferToAmount($actualTransferToAmount) 
    {
        $this->actualTransferToAmount = $actualTransferToAmount;
    }

    /**
     * @return mixed
     */
    public function getPurposeCode()
    {
        return $this->purposeCode;
    }

    /**
     * @param mixed $purposeCode
     */
    public function setPurposeCode($purposeCode) 
    {
        $this->purposeCode = $purposeCode;
    }

    /**
     * @return mixed
     */
    public function getTransferNotifyUrl()
    {
        return $this->transferNotifyUrl;
    }

    /**
     * @param mixed $transferNotifyUrl
     */
    public function setTransferNotifyUrl($transferNotifyUrl) 
    {
        $this->transferNotifyUrl = $transferNotifyUrl;
    }

    /**
     * @return mixed
     */
    public function getTransferRemark()
    {
        return $this->transferRemark;
    }

    /**
     * @param mixed $transferRemark
     */
    public function setTransferRemark($transferRemark) 
    {
        $this->transferRemark = $transferRemark;
    }


}