<?php

require_once 'SignatureTool.php';
require_once 'model/ResultStatusType.php';

abstract class BaseAlipayClient{

    private $gatewayUrl;
    private $merchantPrivateKey;
    private $alipayPublicKey;

    function __construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey) {
        $this->gatewayUrl = $gatewayUrl;
        $this->merchantPrivateKey = $merchantPrivateKey;
        $this->alipayPublicKey = $alipayPublicKey;
    }

    public function execute($request){

        $this->checkRequestParam($request);

        $clientId   = $request->getClientId();
        $httpMethod = $request->getHttpMethod();
        $path       = $request->getPath();
        $keyVersion = $request->getKeyVersion();
        $reqTime    = date(DATE_ISO8601);
        $reqBody    = json_encode($request);

        $signValue     = $this->genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody);
        $baseHeaders   = $this->buildBaseHeader($reqTime, $clientId, $keyVersion, $signValue);
        $customHeaders = $this->buildCustomHeader();
        if(isset($customHeaders) && count($customHeaders) > 0){
            $headers = array_merge($baseHeaders, $customHeaders);
        } else {
            $headers = $baseHeaders;
        }

        $requestUrl = $this->genRequestUrl($path);
        $rsp        = $this->sendRequest($requestUrl, $httpMethod, $headers, $reqBody);
        if(!isset($rsp) || $rsp == null){
            throw new Exception("HttpRpcResult is null.");
        }

        $rspBody      = $rsp->getRspBody();
        $rspSignValue = $rsp->getRspSign();
        $rspTime      = $rsp->getRspTime();

        $alipayRsp = json_decode($rspBody);
        $result    = $alipayRsp->result;
        if(!isset($result)){
            throw new Exception("Response data error,result field is null");
        }
        $rStatus = $result->resultStatus;
        if(strcmp(ResultStatusType::F, $rStatus ) == 0 ||strcmp(ResultStatusType::U, $rStatus ) == 0){
            return $alipayRsp;
        }

        $isVerifyPass = $this->checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue);
        if(!$isVerifyPass){
            throw new Exception("Response signature verify fail.");
        }

        return $alipayRsp;
    }

    private function checkRequestParam($request){

        if(!isset($request)){
            throw new Exception("alipayRequest can't null");
        }

        $clientId   = $request->getClientId();
        $httpMehod  = $request->getHttpMethod();
        $path       = $request->getPath();
        $keyVersion = $request->getKeyVersion();
        
        if (!isset($this->gatewayUrl) || trim($this->gatewayUrl) === ""){
            throw new Exception("clientId can't null");
        }

        if (!isset($clientId) || trim($clientId) === ""){
            throw new Exception("clientId can't null");
        }

        if (!isset($httpMehod) || trim($httpMehod) === ""){
            throw new Exception("httpMehod can't null");
        }

        if (!isset($path) || trim($path) === ""){
            throw new Exception("path can't null");
        }

        if(strpos($path,'/') != 0){
            throw new Exception("path must start with /");
        }
                
        if(isset($keyVersion) && !is_numeric($keyVersion)){
            throw new Exception("keyVersion must be numeric");
        }
        
    }

    private function genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody){
        try {
            $signValue = SignatureTool::sign($httpMethod, $path, $clientId, $reqTime, $reqBody, $this->merchantPrivateKey);
        } catch(Exception $e){
            throw new Exception($e);
        }
        return $signValue;
    }

    private function checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue){
        try {
            $isVerify = SignatureTool::verify($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue, $this->alipayPublicKey);
        } catch(Exception $e){
            throw new Exception($e);
        }
        return $isVerify;
    }

    private function buildBaseHeader($requestTime, $clientId, $keyVersion, $signValue){
        $baseHeader = array();
        $baseHeader[] = "Content-Type:application/json; charset=UTF-8";
        $baseHeader[] = "Request-Time:" . $requestTime;
        $baseHeader[] = "client-id:" . $clientId;

        if (!isset($keyVersion)){
            $keyVersion = 1;
        }
        $signatureHeader = "algorithm=RSA256,keyVersion=". $keyVersion. ",signature=" . $signValue;
        $baseHeader[] = "Signature:" . $signatureHeader;
        return $baseHeader;
    }

    private function genRequestUrl($path){
        if(strpos($this->gatewayUrl,"https://") != 0){
            $this->gatewayUrl = "https://" . $this->gatewayUrl;
        }

        if(substr_compare($this->gatewayUrl, '/', -strlen('/')) === 0){
            $len = strlen($this->gatewayUrl);
            $this->gatewayUrl = substr($this->gatewayUrl ,0,$len - 1);
        }

        $requestUrl = $this->gatewayUrl . $path;
        return $requestUrl;

    }


    abstract protected function buildCustomHeader();

    abstract protected function sendRequest($requestUrl, $httpMethod, $headers, $reqBody);

}