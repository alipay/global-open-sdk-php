<?php

require_once 'request/AlipayRequest.php';

class AlipayUserQueryInfoRequest extends AlipayRequest{

    public $accessToken;

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

}