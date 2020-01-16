<?php
class AlipayRequest{
    private $path;
    private $clientId;
    private $httpMethod = "POST";

    /**
     * @return mixed
     */
    public function getPath(){
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path){
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getClientId(){
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId){
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;
    }

}