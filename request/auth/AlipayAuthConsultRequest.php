<?php

namespace Request\auth;


class AlipayAuthConsultRequest extends \Request\AlipayRequest
{

    public $customerBelongsTo;
    public $authClientId;
    public $authRedirectUrl;
    public $scopes;
    public $authState;
    public $terminalType;
    public $osType;
    public $osVersion;
    public $extendInfo;
    public $merchantRegion;

    public $authMetaData;

    function __construct()
    {
        $this->setPath(\Model\AntomPathConstants::AUTH_CONSULT_PATH);
    }

    /**
     * @return mixed
     */
    public function getAuthMetaData()
    {
        return $this->authMetaData;
    }

    /**
     * @param mixed $authMetaData
     */
    public function setAuthMetaData($authMetaData)
    {
        $this->authMetaData = $authMetaData;
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
    public function getAuthClientId()
    {
        return $this->authClientId;
    }

    /**
     * @param mixed $authClientId
     */
    public function setAuthClientId($authClientId)
    {
        $this->authClientId = $authClientId;
    }

    /**
     * @return mixed
     */
    public function getAuthRedirectUrl()
    {
        return $this->authRedirectUrl;
    }

    /**
     * @param mixed $authRedirectUrl
     */
    public function setAuthRedirectUrl($authRedirectUrl)
    {
        $this->authRedirectUrl = $authRedirectUrl;
    }

    /**
     * @return mixed
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param mixed $scopes
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * @return mixed
     */
    public function getAuthState()
    {
        return $this->authState;
    }

    /**
     * @param mixed $authState
     */
    public function setAuthState($authState)
    {
        $this->authState = $authState;
    }

    /**
     * @return mixed
     */
    public function getTerminalType()
    {
        return $this->terminalType;
    }

    /**
     * @param mixed $terminalType
     */
    public function setTerminalType($terminalType)
    {
        $this->terminalType = $terminalType;
    }

    /**
     * @return mixed
     */
    public function getOsType()
    {
        return $this->osType;
    }

    /**
     * @param mixed $osType
     */
    public function setOsType($osType)
    {
        $this->osType = $osType;
    }

    /**
     * @return mixed
     */
    public function getOsVersion()
    {
        return $this->osVersion;
    }

    /**
     * @param mixed $osVersion
     */
    public function setOsVersion($osVersion)
    {
        $this->osVersion = $osVersion;
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