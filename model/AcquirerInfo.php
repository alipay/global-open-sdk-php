<?php

namespace Model;

class AcquirerInfo
{

    public $acquirerName;

    public $referenceRequestId;

    public $acquirerTransactionId;

    public $acquirerMerchantId;

    public $acquirerResultCode;

    public $acquirerResultMessage;

    /**
     * @return mixed
     */
    public function getAcquirerName()
    {
        return $this->acquirerName;
    }

    /**
     * @param mixed $acquirerName
     */
    public function setAcquirerName($acquirerName) 
    {
        $this->acquirerName = $acquirerName;
    }

    /**
     * @return mixed
     */
    public function getReferenceRequestId()
    {
        return $this->referenceRequestId;
    }

    /**
     * @param mixed $referenceRequestId
     */
    public function setReferenceRequestId($referenceRequestId) 
    {
        $this->referenceRequestId = $referenceRequestId;
    }

    /**
     * @return mixed
     */
    public function getAcquirerTransactionId()
    {
        return $this->acquirerTransactionId;
    }

    /**
     * @param mixed $acquirerTransactionId
     */
    public function setAcquirerTransactionId($acquirerTransactionId) 
    {
        $this->acquirerTransactionId = $acquirerTransactionId;
    }

    /**
     * @return mixed
     */
    public function getAcquirerMerchantId()
    {
        return $this->acquirerMerchantId;
    }

    /**
     * @param mixed $acquirerMerchantId
     */
    public function setAcquirerMerchantId($acquirerMerchantId) 
    {
        $this->acquirerMerchantId = $acquirerMerchantId;
    }

    /**
     * @return mixed
     */
    public function getAcquirerResultCode()
    {
        return $this->acquirerResultCode;
    }

    /**
     * @param mixed $acquirerResultCode
     */
    public function setAcquirerResultCode($acquirerResultCode) 
    {
        $this->acquirerResultCode = $acquirerResultCode;
    }

    /**
     * @return mixed
     */
    public function getAcquirerResultMessage()
    {
        return $this->acquirerResultMessage;
    }

    /**
     * @param mixed $acquirerResultMessage
     */
    public function setAcquirerResultMessage($acquirerResultMessage) 
    {
        $this->acquirerResultMessage = $acquirerResultMessage;
    }




}