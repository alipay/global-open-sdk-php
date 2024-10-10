<?php

namespace Request\risk;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class SendPaymentResultRequest extends AlipayRequest
{

    public $referenceTransactionId;
    public $paymentStatus;

    public $authorizationError;

    public $cardVerificationResult;

    public $paymentMethodProvider;


    function __construct()
    {
        $this->setPath(AntomPathConstants::RISK_SEND_PAYMENT_RESULT_PATH);
    }

    /**
     * @return mixed
     */
    public function getReferenceTransactionId()
    {
        return $this->referenceTransactionId;
    }

    /**
     * @param mixed $referenceTransactionId
     */
    public function setReferenceTransactionId($referenceTransactionId): void
    {
        $this->referenceTransactionId = $referenceTransactionId;
    }

    /**
     * @return mixed
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @param mixed $paymentStatus
     */
    public function setPaymentStatus($paymentStatus): void
    {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationError()
    {
        return $this->authorizationError;
    }

    /**
     * @param mixed $authorizationError
     */
    public function setAuthorizationError($authorizationError): void
    {
        $this->authorizationError = $authorizationError;
    }

    /**
     * @return mixed
     */
    public function getCardVerificationResult()
    {
        return $this->cardVerificationResult;
    }

    /**
     * @param mixed $cardVerificationResult
     */
    public function setCardVerificationResult($cardVerificationResult): void
    {
        $this->cardVerificationResult = $cardVerificationResult;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodProvider()
    {
        return $this->paymentMethodProvider;
    }

    /**
     * @param mixed $paymentMethodProvider
     */
    public function setPaymentMethodProvider($paymentMethodProvider): void
    {
        $this->paymentMethodProvider = $paymentMethodProvider;
    }



}