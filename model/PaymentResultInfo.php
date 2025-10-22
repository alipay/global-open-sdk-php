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

    public $cardholderName;

    public $cardBin;

    public $lastFour;

    public $expiryMonth;

    public $expiryYear;

    public $accountNo;

    public $refusalCodeRaw;

    public $refusalReasonRaw;

    public $merchantAdviceCode;

    public $acquirerInfo;

    public $exemptionRequested;

    /**
     * @return mixed
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * @param mixed $accountNo
     */
    public function setAccountNo($accountNo)
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @return mixed
     */
    public function getRefusalCodeRaw()
    {
        return $this->refusalCodeRaw;
    }

    /**
     * @param mixed $refusalCodeRaw
     */
    public function setRefusalCodeRaw($refusalCodeRaw)
    {
        $this->refusalCodeRaw = $refusalCodeRaw;
    }

    /**
     * @return mixed
     */
    public function getRefusalReasonRaw()
    {
        return $this->refusalReasonRaw;
    }

    /**
     * @param mixed $refusalReasonRaw
     */
    public function setRefusalReasonRaw($refusalReasonRaw)
    {
        $this->refusalReasonRaw = $refusalReasonRaw;
    }

    /**
     * @return mixed
     */
    public function getMerchantAdviceCode()
    {
        return $this->merchantAdviceCode;
    }

    /**
     * @param mixed $merchantAdviceCode
     */
    public function setMerchantAdviceCode($merchantAdviceCode)
    {
        $this->merchantAdviceCode = $merchantAdviceCode;
    }

    /**
     * @return mixed
     */
    public function getAcquirerInfo()
    {
        return $this->acquirerInfo;
    }

    /**
     * @param mixed $acquirerInfo
     */
    public function setAcquirerInfo($acquirerInfo)
    {
        $this->acquirerInfo = $acquirerInfo;
    }

    /**
     * @return mixed
     */
    public function getExemptionRequested()
    {
        return $this->exemptionRequested;
    }

    /**
     * @param mixed $exemptionRequested
     */
    public function setExemptionRequested($exemptionRequested)
    {
        $this->exemptionRequested = $exemptionRequested;
    }






    /**
     * @return mixed
     */
    public function getCardholderName()
    {
        return $this->cardholderName;
    }

    /**
     * @param mixed $cardholderName
     */
    public function setCardholderName($cardholderName)
    {
        $this->cardholderName = $cardholderName;
    }

    /**
     * @return mixed
     */
    public function getCardBin()
    {
        return $this->cardBin;
    }

    /**
     * @param mixed $cardBin
     */
    public function setCardBin($cardBin)
    {
        $this->cardBin = $cardBin;
    }

    /**
     * @return mixed
     */
    public function getLastFour()
    {
        return $this->lastFour;
    }

    /**
     * @param mixed $lastFour
     */
    public function setLastFour($lastFour)
    {
        $this->lastFour = $lastFour;
    }

    /**
     * @return mixed
     */
    public function getExpiryMonth()
    {
        return $this->expiryMonth;
    }

    /**
     * @param mixed $expiryMonth
     */
    public function setExpiryMonth($expiryMonth)
    {
        $this->expiryMonth = $expiryMonth;
    }

    /**
     * @return mixed
     */
    public function getExpiryYear()
    {
        return $this->expiryYear;
    }

    /**
     * @param mixed $expiryYear
     */
    public function setExpiryYear($expiryYear)
    {
        $this->expiryYear = $expiryYear;
    }



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
    public function setCardNo($cardNo) 
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
    public function setCardBrand($cardBrand) 
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
    public function setCardToken($cardToken) 
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
    public function setIssuingCountry($issuingCountry) 
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
    public function setFunding($funding) 
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
    public function setPaymentMethodRegion($paymentMethodRegion) 
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
    public function setThreeDSResult($threeDSResult) 
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
    public function setAvsResultRaw($avsResultRaw) 
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
    public function setCvvResultRaw($cvvResultRaw) 
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
    public function setNetworkTransactionId($networkTransactionId) 
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
    public function setCreditPayPlan($creditPayPlan) 
    {
        $this->creditPayPlan = $creditPayPlan;
    }




}