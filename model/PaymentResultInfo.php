<?php

namespace Model;

class PaymentResultInfo
{

    public $cardNo;

    public $cardBrand;

    public $cardToken;

    public $issuingCountry;

    public $funding;

    public $paymentMethodRegion;

    public $threeDSResult;

    public $avsResultRaw;

    public $cvvResultRaw;

    public $networkTransactionId;

    public $creditPayPlan;

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo): void
    {
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * @param mixed $cardBrand
     */
    public function setCardBrand($cardBrand): void
    {
        $this->cardBrand = $cardBrand;
    }

    /**
     * @return mixed
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param mixed $cardToken
     */
    public function setCardToken($cardToken): void
    {
        $this->cardToken = $cardToken;
    }

    /**
     * @return mixed
     */
    public function getIssuingCountry()
    {
        return $this->issuingCountry;
    }

    /**
     * @param mixed $issuingCountry
     */
    public function setIssuingCountry($issuingCountry): void
    {
        $this->issuingCountry = $issuingCountry;
    }

    /**
     * @return mixed
     */
    public function getFunding()
    {
        return $this->funding;
    }

    /**
     * @param mixed $funding
     */
    public function setFunding($funding): void
    {
        $this->funding = $funding;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodRegion()
    {
        return $this->paymentMethodRegion;
    }

    /**
     * @param mixed $paymentMethodRegion
     */
    public function setPaymentMethodRegion($paymentMethodRegion): void
    {
        $this->paymentMethodRegion = $paymentMethodRegion;
    }

    /**
     * @return mixed
     */
    public function getThreeDSResult()
    {
        return $this->threeDSResult;
    }

    /**
     * @param mixed $threeDSResult
     */
    public function setThreeDSResult($threeDSResult): void
    {
        $this->threeDSResult = $threeDSResult;
    }

    /**
     * @return mixed
     */
    public function getAvsResultRaw()
    {
        return $this->avsResultRaw;
    }

    /**
     * @param mixed $avsResultRaw
     */
    public function setAvsResultRaw($avsResultRaw): void
    {
        $this->avsResultRaw = $avsResultRaw;
    }

    /**
     * @return mixed
     */
    public function getCvvResultRaw()
    {
        return $this->cvvResultRaw;
    }

    /**
     * @param mixed $cvvResultRaw
     */
    public function setCvvResultRaw($cvvResultRaw): void
    {
        $this->cvvResultRaw = $cvvResultRaw;
    }

    /**
     * @return mixed
     */
    public function getNetworkTransactionId()
    {
        return $this->networkTransactionId;
    }

    /**
     * @param mixed $networkTransactionId
     */
    public function setNetworkTransactionId($networkTransactionId): void
    {
        $this->networkTransactionId = $networkTransactionId;
    }

    /**
     * @return mixed
     */
    public function getCreditPayPlan()
    {
        return $this->creditPayPlan;
    }

    /**
     * @param mixed $creditPayPlan
     */
    public function setCreditPayPlan($creditPayPlan): void
    {
        $this->creditPayPlan = $creditPayPlan;
    }




}