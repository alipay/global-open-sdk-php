<?php


namespace Request\auth;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayAuthApplyTokenRequest extends AlipayRequest
{

    public $grantType;
    public $customerBelongsTo;
    public $authCode;
    public $refreshToken;
    public $extendInfo;
    public $merchantRegion;


    function __construct()
    {
        $this->setPath(AntomPathConstants::AUTH_APPLY_TOKEN_PATH);
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
    public function getGrantType()
    {
        return $this->grantType;
    }

    /**
     * @param mixed $grantType
     */
    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;
    }

    /**
     * @return mixed
     */
    public function getCustomerBelongsTo()
    {
        return $this->customerBelongsTo;
    }

    /**
     * @param mixed $customerBelongsTo
     */
    public function setCustomerBelongsTo($customerBelongsTo)
    {
        $this->customerBelongsTo = $customerBelongsTo;
    }

    /**
     * @return mixed
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param mixed $authCode
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
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

}