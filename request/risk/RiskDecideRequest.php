<?php

namespace Request\risk;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class RiskDecideRequest extends AlipayRequest
{

    public $referenceTransactionId;
    public $authorizationPhase;
    public $orders;
    public $buyer;
    public $actualPaymentAmount;
    public $paymentDetails;
    public $discountAmount;
    public $env;


    function __construct()
    {
        $this->setPath(AntomPathConstants::RISK_DECIDE_PATH);
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
    public function getAuthorizationPhase()
    {
        return $this->authorizationPhase;
    }

    /**
     * @param mixed $authorizationPhase
     */
    public function setAuthorizationPhase($authorizationPhase): void
    {
        $this->authorizationPhase = $authorizationPhase;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param mixed $orders
     */
    public function setOrders($orders): void
    {
        $this->orders = $orders;
    }

    /**
     * @return mixed
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param mixed $buyer
     */
    public function setBuyer($buyer): void
    {
        $this->buyer = $buyer;
    }

    /**
     * @return mixed
     */
    public function getActualPaymentAmount()
    {
        return $this->actualPaymentAmount;
    }

    /**
     * @param mixed $actualPaymentAmount
     */
    public function setActualPaymentAmount($actualPaymentAmount): void
    {
        $this->actualPaymentAmount = $actualPaymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentDetails()
    {
        return $this->paymentDetails;
    }

    /**
     * @param mixed $paymentDetails
     */
    public function setPaymentDetails($paymentDetails): void
    {
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * @return mixed
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * @param mixed $discountAmount
     */
    public function setDiscountAmount($discountAmount): void
    {
        $this->discountAmount = $discountAmount;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     */
    public function setEnv($env): void
    {
        $this->env = $env;
    }




}