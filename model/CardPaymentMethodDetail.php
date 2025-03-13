<?php

namespace Model;
class CardPaymentMethodDetail
{

    public $cardToken;
    public $cardNo;
    public $brand;
    public $selectedCardBrand;
    public $cardIssuer;
    public $countryIssue;
    public $instUserName;
    public $expiryYear;
    public $expiryMonth;
    public $billingAddress;
    public $mask;
    public $last4;
    public $paymentMethodDetailMetadata;

    public $maskedCardNo;

    public $fingerprint;

    public $authenticationFlow;

    public $funding;

    public $avsResultRaw;

    public $bin;

    public $issuerName;

    public $issuingCountry;

    public $lastFour;

    public $cardholderName;

    public $cvv;

    public $dateOfBirth;

    public $businessNo;

    public $cardPasswordDigest;

    public $cpf;

    public $payerEmail;

    public $networkTransactionId;

    public $is3DSAuthentication;



    /**
     * @return mixed
     */
    public function getIs3DSAuthentication()
    {
        return $this->is3DSAuthentication;
    }


    /**
     * @param mixed $is3DSAuthentication
     */
    public function setIs3DSAuthentication($is3DSAuthentication)
    {
        $this->is3DSAuthentication = $is3DSAuthentication;
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
    public function getSelectedCardBrand()
    {
        return $this->selectedCardBrand;
    }

    /**
     * @param mixed $selectedCardBrand
     */
    public function setSelectedCardBrand($selectedCardBrand)
    {
        $this->selectedCardBrand = $selectedCardBrand;
    }

    /**
     * @return mixed
     */
    public function getMaskedCardNo()
    {
        return $this->maskedCardNo;
    }

    /**
     * @param mixed $maskedCardNo
     */
    public function setMaskedCardNo($maskedCardNo)
    {
        $this->maskedCardNo = $maskedCardNo;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param mixed $fingerprint
     */
    public function setFingerprint($fingerprint) 
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationFlow()
    {
        return $this->authenticationFlow;
    }

    /**
     * @param mixed $authenticationFlow
     */
    public function setAuthenticationFlow($authenticationFlow) 
    {
        $this->authenticationFlow = $authenticationFlow;
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
    public function getBin()
    {
        return $this->bin;
    }

    /**
     * @param mixed $bin
     */
    public function setBin($bin) 
    {
        $this->bin = $bin;
    }

    /**
     * @return mixed
     */
    public function getIssuerName()
    {
        return $this->issuerName;
    }

    /**
     * @param mixed $issuerName
     */
    public function setIssuerName($issuerName) 
    {
        $this->issuerName = $issuerName;
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
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv) 
    {
        $this->cvv = $cvv;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth) 
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getBusinessNo()
    {
        return $this->businessNo;
    }

    /**
     * @param mixed $businessNo
     */
    public function setBusinessNo($businessNo) 
    {
        $this->businessNo = $businessNo;
    }

    /**
     * @return mixed
     */
    public function getCardPasswordDigest()
    {
        return $this->cardPasswordDigest;
    }

    /**
     * @param mixed $cardPasswordDigest
     */
    public function setCardPasswordDigest($cardPasswordDigest) 
    {
        $this->cardPasswordDigest = $cardPasswordDigest;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf) 
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getPayerEmail()
    {
        return $this->payerEmail;
    }

    /**
     * @param mixed $payerEmail
     */
    public function setPayerEmail($payerEmail) 
    {
        $this->payerEmail = $payerEmail;
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
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getCardIssuer()
    {
        return $this->cardIssuer;
    }

    /**
     * @param mixed $cardIssuer
     */
    public function setCardIssuer($cardIssuer)
    {
        $this->cardIssuer = $cardIssuer;
    }

    /**
     * @return mixed
     */
    public function getCountryIssue()
    {
        return $this->countryIssue;
    }

    /**
     * @param mixed $countryIssue
     */
    public function setCountryIssue($countryIssue)
    {
        $this->countryIssue = $countryIssue;
    }

    /**
     * @return mixed
     */
    public function getInstUserName()
    {
        return $this->instUserName;
    }

    /**
     * @param mixed $instUserName
     */
    public function setInstUserName($instUserName)
    {
        $this->instUserName = $instUserName;
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
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param mixed $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return mixed
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @param mixed $mask
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
    }

    /**
     * @return mixed
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * @param mixed $last4
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodDetailMetadata()
    {
        return $this->paymentMethodDetailMetadata;
    }

    /**
     * @param mixed $paymentMethodDetailMetadata
     */
    public function setPaymentMethodDetailMetadata($paymentMethodDetailMetadata)
    {
        $this->paymentMethodDetailMetadata = $paymentMethodDetailMetadata;
    }

}