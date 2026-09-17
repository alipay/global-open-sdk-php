<?php

namespace Client;

/** Independent API Key client using the existing Request and response conventions. */
class ApiKeyAlipayClient
{
    private $auth;
    private $connectTimeout;
    private $timeout;

    public function __construct(array $config)
    {
        $this->auth = new ApiKeyAuth($config['gatewayUrl'] ?? null, $config['apiKey'] ?? null);
        $this->connectTimeout = $config['connectTimeout'] ?? 15;
        $this->timeout = $config['timeout'] ?? 30;
        if (!is_int($this->connectTimeout) || $this->connectTimeout <= 0
            || !is_int($this->timeout) || $this->timeout <= 0) {
            throw new \InvalidArgumentException('Timeouts must be positive integer seconds');
        }
    }

    public function execute($request)
    {
        return $this->executeWithHeaders($request);
    }

    public function executeWithHeaders($request, $extraHeaders = [])
    {
        if ($request === null) {
            throw new \Exception("alipayRequest can't null");
        }
        if (RequestTransportResolver::requiresSessionHttp2($request)) {
            return SessionHttp2Executor::execute($this->auth->gatewayUrl(), $request, $extraHeaders);
        }
        if (strtoupper($request->getHttpMethod()) !== 'POST') {
            throw new \InvalidArgumentException('Only POST is supported for ordinary API requests');
        }
        $url = $this->auth->gatewayUrl() . $this->auth->path($request->getPath());
        $headers = array_merge([
            'Authorization:' . $this->auth->authorization(),
            'Content-Type:application/json; charset=UTF-8',
            'User-Agent:' . SdkVersion::userAgent(),
        ], ApiKeyAuth::extraHeaders($extraHeaders));
        $body = json_encode($request);
        if ($body === false) {
            throw new \Exception('Failed to serialize request JSON');
        }
        $curl = curl_init($url);
        try {
            curl_setopt_array($curl, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_CONNECTTIMEOUT => $this->connectTimeout,
                CURLOPT_TIMEOUT => $this->timeout,
            ]);
            // Honor the application's configured CA bundle without disabling verification.
            $caInfo = ini_get('curl.cainfo');
            if ($caInfo !== false && $caInfo !== '') {
                curl_setopt($curl, CURLOPT_CAINFO, $caInfo);
            }
            $responseBody = curl_exec($curl);
            if ($responseBody === false) {
                throw new \Exception('HTTP request failed: ' . $this->auth->redact(curl_error($curl)));
            }
            if (curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
                throw new \Exception('HttpRpcResult is null. HTTP ' . curl_getinfo($curl, CURLINFO_HTTP_CODE));
            }
            $response = json_decode($responseBody);
            if (!is_object($response) || !isset($response->result)) {
                throw new \Exception('Response data error,result field is null');
            }
            return $response;
        } finally {
            if (is_resource($curl)) {
                curl_close($curl);
            }
            unset($curl);
        }
    }
}
