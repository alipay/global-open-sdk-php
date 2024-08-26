<?php

require_once 'request/AlipayRequest.php';
require_once 'model/AntomPathConstants.php';

class AlipayAuthQueryTokenRequest extends AlipayRequest{
    public $accessToken;

    function __construct(){
        $this->setPath(AntomPathConstants::AUTH_QUERY_PATH);
    }


    /**
     * @return mixed
     */
    public function getAccessToken(){
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken){
        $this->accessToken = $accessToken;
    }

}