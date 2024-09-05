<?php

namespace Request\auth;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayAuthRevokeTokenRequest extends AlipayRequest
{

    public $accessToken;
    public $extendInfo;

    function __construct()
    {
        $this->setPath(AntomPathConstants::AUTH_REVOKE_PATH);
    }


    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
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