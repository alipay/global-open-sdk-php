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
    public function setAcquirerName($acquirerName): void
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
    public function setReferenceRequestId($referenceRequestId): void
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
    public function setAcquirerTransactionId($acquirerTransactionId): void
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
    public function setAcquirerMerchantId($acquirerMerchantId): void
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
    public function setAcquirerResultCode($acquirerResultCode): void
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
    public function setAcquirerResultMessage($acquirerResultMessage): void
    {
        $this->acquirerResultMessage = $acquirerResultMessage;
    }




}