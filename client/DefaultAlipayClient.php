<?php

namespace Client;

class DefaultAlipayClient extends \Client\BaseAlipayClient
{
    private $uploadGatewayUrl;
    private $fileGatewayUrl;
    private $fileClientId;
    private $fileMerchantPrivateKey;
    private $fileAlipayPublicKey;
    private $fileAgentToken;

    public function __construct()
    {
        $a = func_get_args();
        $i = func_num_args() + 3;
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    public function __construct6($gatewayUrl, $merchantPrivateKey, $alipayPublicKey)
    {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey);
        $this->configureFileClient($gatewayUrl, null, $merchantPrivateKey, $alipayPublicKey, null);
    }

    public function __construct7($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId)
    {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId);
        $this->configureFileClient($gatewayUrl, $clientId, $merchantPrivateKey, $alipayPublicKey, null);
    }

    public function __construct8($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId, $agentToken)
    {
        parent::__construct($gatewayUrl, $merchantPrivateKey, $alipayPublicKey, $clientId, $agentToken);
        $this->configureFileClient($gatewayUrl, $clientId, $merchantPrivateKey, $alipayPublicKey, $agentToken);
    }

    protected function buildCustomHeader()
    {
        return null;
    }

    public function setUploadGatewayUrl($uploadGatewayUrl)
    {
        $this->uploadGatewayUrl = UploadGatewayResolver::normalizeExplicit($uploadGatewayUrl);
        return $this;
    }

    /**
     * Uploads an SDK-provided file request through the OpenApiV2File transport.
     *
     * @param \Request\AlipayFileRequest $request
     * @return mixed
     */
    public function uploadFile($request)
    {
        if (!$request instanceof \Request\AlipayFileRequest) {
            throw new \InvalidArgumentException('request must be an SDK-provided AlipayFileRequest');
        }
        return FileUploadExecutor::execute(
            $request,
            [
                'gatewayUrl' => $this->fileGatewayUrl,
                'uploadGatewayUrl' => $this->uploadGatewayUrl,
                'clientId' => $this->fileClientId,
                'merchantPrivateKey' => $this->fileMerchantPrivateKey,
                'alipayPublicKey' => $this->fileAlipayPublicKey,
                'agentToken' => $this->fileAgentToken,
                'customHeaders' => $this->buildCustomHeader(),
            ]
        );
    }

    private function configureFileClient($gatewayUrl, $clientId, $merchantPrivateKey, $alipayPublicKey, $agentToken)
    {
        $this->fileGatewayUrl = $gatewayUrl;
        $this->fileClientId = $clientId;
        $this->fileMerchantPrivateKey = $merchantPrivateKey;
        $this->fileAlipayPublicKey = $alipayPublicKey;
        $this->fileAgentToken = $agentToken;
    }

    protected function sendRequest($requestUrl, $httpMethod, $headers, $reqBody)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $requestUrl);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $reqBody);

        $rspContent = curl_exec($curl);

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) != '200') {
            return null;
        }

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headerContent = substr($rspContent, 0, $headerSize);
        $rspBody = substr($rspContent, $headerSize);

        $httpRpcResult = new \Model\HttpRpcResult();
        $httpRpcResult->setRspBody($rspBody);

        $headArr = explode("\r\n", $headerContent);
        foreach ($headArr as $headerItem) {
            if (strstr($headerItem, "response-time") || strstr($headerItem, "signature")) {
                $responseTime = $this->getResponseTime($headerItem);
                if (isset($responseTime) && $responseTime != null) {
                    $httpRpcResult->setRspTime(trim($responseTime));
                } else {
                    $signatureValue = $this->getResponseSignature($headerItem);
                    if (isset($signatureValue) && $signatureValue != null) {
                        $httpRpcResult->setRspSign($signatureValue);
                    }
                }
            }
        }

        curl_close($curl);

        return $httpRpcResult;
    }

    private function getResponseTime($headerItem)
    {
        if (strstr($headerItem, "response-time")) {
            $startIndex = strpos($headerItem, ":") + 1;
            $responseTime = substr($headerItem, $startIndex);
            return $responseTime;
        }
        return null;
    }

    private function getResponseSignature($headerItem)
    {
        if (strstr($headerItem, "signature")) {
            $startIndex = strrpos($headerItem, "=") + 1;
            $signatureValue = substr($headerItem, $startIndex);
            return $signatureValue;
        }
        return null;
    }
}
