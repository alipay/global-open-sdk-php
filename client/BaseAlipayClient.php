<?php

namespace Client;

abstract class BaseAlipayClient
{
    public const DEFAULT_KEY_VERSION = 1;
    private $gatewayUrl;
    private $merchantPrivateKey;
    private $alipayPublicKey;
    private $clientId;

    private $agentToken;

    private $isSandboxMode;

    public function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    public function __construct3($gatewayUrl, $merchantPrivateKey, $alipayPublicKey)
    {
        $this->gatewayUrl = $gatewayUrl;
        $this->merchantPrivateKey = $merchantPrivateKey;
        $this->alipayPublicKey = $alipayPublicKey;
    }

    public function __construct4($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId)
    {
        $this->gatewayUrl = $gatewayUrl;
        $this->merchantPrivateKey = $merchantPrivateKey;
        $this->alipayPublicKey = $alipayPublicKey;
        $this->clientId = $clientId;

        if (strpos($clientId, "SANDBOX_") === 0) {
            $this->isSandboxMode = true;
        }

    }

    public function __construct5($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId, $agentToken)
    {
        $this->gatewayUrl = $gatewayUrl;
        $this->merchantPrivateKey = $merchantPrivateKey;
        $this->alipayPublicKey = $alipayPublicKey;
        $this->clientId = $clientId;
        $this->agentToken = $agentToken;

        if (strpos($clientId, "SANDBOX_") === 0) {
            $this->isSandboxMode = true;
        }

    }


    public function execute($request)
    {

        if ($request->getClientId() === null || trim($request->getClientId()) === "") {
            $request->setClientId($this->clientId);
        }

        $this->checkRequestParam($request);

        $clientId = $request->getClientId();
        if (strpos($clientId, "SANDBOX_") === 0) {
            $this->isSandboxMode = true;
        }
        $this->adjustSandboxUrl($request);
        $httpMethod = $request->getHttpMethod();
        $path = $request->getPath();
        $keyVersion = $request->getKeyVersion();
        $reqTime = date(DATE_ISO8601);
        $reqBody = json_encode($request);

        $signValue = $this->genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody);
        $baseHeaders = $this->buildBaseHeader($reqTime, $clientId, $keyVersion, $signValue);
        $customHeaders = $this->buildCustomHeader();
        if (isset($customHeaders) && count($customHeaders) > 0) {
            $headers = array_merge($baseHeaders, $customHeaders);
        } else {
            $headers = $baseHeaders;
        }
        $headers = $this->applySdkUserAgent($headers);

        $requestUrl = $this->genRequestUrl($path);
        $rsp = $this->sendRequest($requestUrl, $httpMethod, $headers, $reqBody);
        if (!isset($rsp) || $rsp == null) {
            throw new \Exception("HttpRpcResult is null.");
        }

        $rspBody = $rsp->getRspBody();
        $rspSignValue = $rsp->getRspSign();
        $rspTime = $rsp->getRspTime();

        $alipayRsp = json_decode($rspBody);

        $result = $alipayRsp->result;
        if (!isset($result)) {
            throw new \Exception("Response data error,result field is null,rspBody:" . $rspBody);
        }

        if (!isset($rspSignValue) || trim($rspSignValue) === "" || !isset($rspTime) || trim($rspTime) === "") {
            return $alipayRsp;
        }

        $isVerifyPass = $this->checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue);

        if (!$isVerifyPass) {
            throw new \Exception("Response signature verify fail.");
        }

        return $alipayRsp;
    }

    private static $RESERVED_HEADERS = ["signature", "client-id", "request-time", "content-type", "agent-token", "user-agent"];
    // Billing and Meter APIs now support sandbox. Keep the filter logic for future use.
    private static $SANDBOX_PRODUCTION_PATH_PREFIXES = [
    ];

    public function executeWithHeaders($request, $extraHeaders = [])
    {

        if (RequestTransportResolver::requiresSessionHttp2($request)) {
            return SessionHttp2Executor::execute($this->gatewayUrl, $request, $extraHeaders);
        }

        if ($request->getClientId() === null || trim($request->getClientId()) === "") {
            $request->setClientId($this->clientId);
        }

        $this->checkRequestParam($request);

        $clientId = $request->getClientId();
        if (strpos($clientId, "SANDBOX_") === 0) {
            $this->isSandboxMode = true;
        }
        $this->adjustSandboxUrl($request);
        $httpMethod = $request->getHttpMethod();
        $path = $request->getPath();
        $keyVersion = $request->getKeyVersion();
        $reqTime = date(DATE_ISO8601);
        $reqBody = json_encode($request);

        $signValue = $this->genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody);
        $baseHeaders = $this->buildBaseHeader($reqTime, $clientId, $keyVersion, $signValue);
        $customHeaders = $this->buildCustomHeader();
        if (isset($customHeaders) && count($customHeaders) > 0) {
            $headers = array_merge($baseHeaders, $customHeaders);
        } else {
            $headers = $baseHeaders;
        }
        if (!empty($extraHeaders)) {
            $existingKeys = [];
            foreach ($headers as $line) {
                $colonPos = strpos($line, ':');
                if ($colonPos !== false) {
                    $existingKeys[strtolower(substr($line, 0, $colonPos))] = true;
                }
            }
            foreach ($extraHeaders as $key => $value) {
                if ($key === null || $key === "") {
                    continue;
                }
                $lk = strtolower($key);
                if (in_array($lk, self::$RESERVED_HEADERS, true)) {
                    continue;
                }
                if (isset($existingKeys[$lk])) {
                    continue;
                }
                $headers[] = $key . ":" . $value;
                $existingKeys[$lk] = true;
            }
        }
        $headers = $this->applySdkUserAgent($headers);

        $requestUrl = $this->genRequestUrl($path);
        $rsp = $this->sendRequest($requestUrl, $httpMethod, $headers, $reqBody);
        if (!isset($rsp) || $rsp == null) {
            throw new \Exception("HttpRpcResult is null.");
        }

        $rspBody = $rsp->getRspBody();
        $rspSignValue = $rsp->getRspSign();
        $rspTime = $rsp->getRspTime();

        $alipayRsp = json_decode($rspBody);

        $result = $alipayRsp->result;
        if (!isset($result)) {
            throw new \Exception("Response data error,result field is null,rspBody:" . $rspBody);
        }

        if (!isset($rspSignValue) || trim($rspSignValue) === "" || !isset($rspTime) || trim($rspTime) === "") {
            return $alipayRsp;
        }

        $isVerifyPass = $this->checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue);

        if (!$isVerifyPass) {
            throw new \Exception("Response signature verify fail.");
        }

        return $alipayRsp;
    }

    private function checkRequestParam($request)
    {

        if (!isset($request)) {
            throw new \Exception("alipayRequest can't null");
        }

        $clientId = $request->getClientId();
        $httpMehod = $request->getHttpMethod();
        $path = $request->getPath();
        $keyVersion = $request->getKeyVersion();

        if (!isset($this->gatewayUrl) || trim($this->gatewayUrl) === "") {
            throw new \Exception("clientId can't null");
        }

        if (!isset($clientId) || trim($clientId) === "") {
            throw new \Exception("clientId can't null");
        }

        if (!isset($httpMehod) || trim($httpMehod) === "") {
            throw new \Exception("httpMehod can't null");
        }

        if (!isset($path) || trim($path) === "") {
            throw new \Exception("path can't null");
        }

        if (strpos($path, '/') != 0) {
            throw new \Exception("path must start with /");
        }

        if (isset($keyVersion) && !is_numeric($keyVersion)) {
            throw new \Exception("keyVersion must be numeric");
        }

    }

    private function genSignValue($httpMethod, $path, $clientId, $reqTime, $reqBody)
    {
        try {
            $signValue = \Client\SignatureTool::sign($httpMethod, $path, $clientId, $reqTime, $reqBody, $this->merchantPrivateKey);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
        return $signValue;
    }

    private function checkRspSign($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue)
    {
        try {
            $isVerify = \Client\SignatureTool::verify($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue, $this->alipayPublicKey);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
        return $isVerify;
    }

    private function buildBaseHeader($requestTime, $clientId, $keyVersion, $signValue)
    {
        $baseHeader = array();
        $baseHeader[] = "Content-Type:application/json; charset=UTF-8";
        $baseHeader[] = "User-Agent:" . SdkVersion::userAgent();
        $baseHeader[] = "Request-Time:" . $requestTime;
        $baseHeader[] = "client-id:" . $clientId;

        if (isset($this->agentToken)) {
            $baseHeader[] = "agent-token:" . $this->agentToken;
        }

        if (!isset($keyVersion)) {
            $keyVersion = self::DEFAULT_KEY_VERSION;
        }
        $signatureHeader = "algorithm=RSA256,keyVersion=" . $keyVersion . ",signature=" . $signValue;
        $baseHeader[] = "Signature:" . $signatureHeader;
        return $baseHeader;
    }

    private function applySdkUserAgent($headers)
    {
        $result = array();
        foreach ($headers as $header) {
            $colonPos = strpos($header, ':');
            if ($colonPos !== false && strtolower(substr($header, 0, $colonPos)) === 'user-agent') {
                continue;
            }
            $result[] = $header;
        }
        $result[] = "User-Agent:" . SdkVersion::userAgent();
        return $result;
    }

    private function genRequestUrl($path)
    {
        if (strpos($this->gatewayUrl, "https://") != 0) {
            $this->gatewayUrl = "https://" . $this->gatewayUrl;
        }

        if (substr_compare($this->gatewayUrl, '/', -strlen('/')) === 0) {
            $len = strlen($this->gatewayUrl);
            $this->gatewayUrl = substr($this->gatewayUrl, 0, $len - 1);
        }

        $requestUrl = $this->gatewayUrl . $path;
        return $requestUrl;

    }

    private function adjustSandboxUrl($alipayRequest)
    {
        if ($this->isSandboxMode) {
            $originPath = $alipayRequest->getPath();
            if ($this->shouldUseProductionPathInSandbox($originPath)) {
                return;
            }
            $newPath = preg_replace('/\/ams\/api/', '/ams/sandbox/api', $originPath, 1);
            $alipayRequest->setPath($newPath);
        }
    }

    private function shouldUseProductionPathInSandbox($path)
    {
        foreach (self::$SANDBOX_PRODUCTION_PATH_PREFIXES as $prefix) {
            if (strpos($path, $prefix) === 0) {
                return true;
            }
        }
        return false;
    }

    abstract protected function buildCustomHeader();

    abstract protected function sendRequest($requestUrl, $httpMethod, $headers, $reqBody);


}
