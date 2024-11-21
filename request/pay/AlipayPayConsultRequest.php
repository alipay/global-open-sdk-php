<?php

namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayPayConsultRequest extends AlipayRequest
{

    public $productCode;
    public $paymentAmount;
    public $allowedPaymentMethods;
    public $allowedPaymentMethodRegions;
    public $blockedPaymentMethods;
    public $region;
    public $customerId;
    public $referenceUserId;
    public $env;
    public $extendInfo;
    public $userRegion;
    public $paymentFactor;
    public $settlementStrategy;
    public $merchant;
    public $allowedPspRegions;

    public $merchantAccountId;

    public $merchantRegion;

    public $buyer;


    function __construct()
    {
        $this->setPath(AntomPathConstants::CONSULT_PAYMENT_PATH);
    }


    /**
     * @return mixed
     */
    public function getMerchantRegion()
    {
        return $this->merchantRegion;
    }

    /**
     * @param mixed $merchantRegion
     */
    public function setMerchantRegion($merchantRegion)
    {
        $this->merchantRegion = $merchantRegion;
    }

    /**
     * @return mixed
     */
    public function getAllowedPaymentMethodRegions()
    {
        return $this->allowedPaymentMethodRegions;
    }

    /**
     * @param mixed $allowedPaymentMethodRegions
     */
    public function setAllowedPaymentMethodRegions($allowedPaymentMethodRegions)
    {
        $this->allowedPaymentMethodRegions = $allowedPaymentMethodRegions;
    }


    /**
     * @return mixed
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param mixed $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getAllowedPaymentMethods()
    {
        return $this->allowedPaymentMethods;
    }

    /**
     * @param mixed $allowedPaymentMethods
     */
    public function setAllowedPaymentMethods($allowedPaymentMethods)
    {
        $this->allowedPaymentMethods = $allowedPaymentMethods;
    }

    /**
     * @return mixed
     */
    public function getBlockedPaymentMethods()
    {
        return $this->blockedPaymentMethods;
    }

    /**
     * @param mixed $blockedPaymentMethods
     */
    public function setBlockedPaymentMethods($blockedPaymentMethods)
    {
        $this->blockedPaymentMethods = $blockedPaymentMethods;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getReferenceUserId()
    {
        return $this->referenceUserId;
    }

    /**
     * @param mixed $referenceUserId
     */
    public function setReferenceUserId($referenceUserId)
    {
        $this->referenceUserId = $referenceUserId;
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
    public function setEnv($env)
    {
        $this->env = $env;
    }

    /**
     * @return mixed
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param mixed $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }

    /**
     * @return mixed
     */
    public function getUserRegion()
    {
        return $this->userRegion;
    }

    /**
     * @param mixed $userRegion
     */
    public function setUserRegion($userRegion)
    {
        $this->userRegion = $userRegion;
    }

    /**
     * @return mixed
     */
    public function getPaymentFactor()
    {
        return $this->paymentFactor;
    }

    /**
     * @param mixed $paymentFactor
     */
    public function setPaymentFactor($paymentFactor)
    {
        $this->paymentFactor = $paymentFactor;
    }

    /**
     * @return mixed
     */
    public function getSettlementStrategy()
    {
        return $this->settlementStrategy;
    }

    /**
     * @param mixed $settlementStrategy
     */
    public function setSettlementStrategy($settlementStrategy)
    {
        $this->settlementStrategy = $settlementStrategy;
    }

    /**
     * @return mixed
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param mixed $merchant
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @return mixed
     */
    public function getAllowedPspRegions()
    {
        return $this->allowedPspRegions;
    }

    /**
     * @param mixed $allowedPspRegions
     */
    public function setAllowedPspRegions($allowedPspRegions)
    {
        $this->allowedPspRegions = $allowedPspRegions;
    }

    /**
     * @return mixed
     */
    public function getMerchantAccountId()
    {
        return $this->merchantAccountId;
    }

    /**
     * @param mixed $merchantAccountId
     */
    public function setMerchantAccountId($merchantAccountId)
    {
        $this->merchantAccountId = $merchantAccountId;
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
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }


}