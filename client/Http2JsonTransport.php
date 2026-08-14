<?php

namespace Client;

final class Http2JsonTransport
{
    private const MIN_STRICT_HTTP2_CURL_VERSION = 0x080A00;

    private function __construct()
    {
    }

    public static function post($gatewayUrl, $path, $sessionId, $requestBody)
    {
        self::assertHttp2Capability();
        $requestUrl = self::buildRequestUrl($gatewayUrl, $path);
        $curl = curl_init($requestUrl);
        if ($curl === false) {
            throw new \RuntimeException('Failed to initialize cURL.');
        }

        try {
            curl_setopt_array($curl, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $requestBody,
                CURLOPT_HTTPHEADER => [
                    'X-Session-Id: ' . $sessionId,
                    'Content-Type: application/json; charset=UTF-8',
                    'Accept: application/json',
                    'User-Agent: ' . SdkVersion::userAgent(),
                ],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_MAXREDIRS => 0,
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_PRIOR_KNOWLEDGE,
            ]);

            $responseBody = curl_exec($curl);
            if ($responseBody === false) {
                throw new \RuntimeException('HTTP/2 request failed: ' . curl_error($curl));
            }
            $httpVersion = curl_getinfo($curl, CURLINFO_HTTP_VERSION);
            if ($httpVersion !== CURL_HTTP_VERSION_2_0) {
                throw new \RuntimeException('This API requires HTTP/2; the negotiated protocol was not HTTP/2.');
            }
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($statusCode !== 200) {
                throw new \RuntimeException(
                    'Response data error, HTTP status=' . $statusCode . ', rspBody:' . $responseBody
                );
            }
            return $responseBody;
        } finally {
            if (PHP_VERSION_ID < 80500) {
                curl_close($curl);
            }
        }
    }

    private static function assertHttp2Capability()
    {
        $version = curl_version();
        $hasHttp2 = defined('CURL_VERSION_HTTP2')
            && (($version['features'] & CURL_VERSION_HTTP2) === CURL_VERSION_HTTP2);
        if (!$hasHttp2 || !defined('CURL_HTTP_VERSION_2_PRIOR_KNOWLEDGE')) {
            throw new \RuntimeException('This API requires a libcurl build with HTTP/2 support.');
        }
        if ($version['version_number'] < self::MIN_STRICT_HTTP2_CURL_VERSION) {
            throw new \RuntimeException(
                'This API requires libcurl 8.10.0 or later to prevent HTTP/1.1 fallback over HTTPS.'
            );
        }
    }

    private static function buildRequestUrl($gatewayUrl, $path)
    {
        $parts = parse_url(trim($gatewayUrl));
        if ($parts === false
            || !isset($parts['scheme'], $parts['host'])
            || strcasecmp($parts['scheme'], 'https') !== 0
            || isset($parts['user'])
            || isset($parts['pass'])
            || isset($parts['query'])
            || isset($parts['fragment'])
            || (isset($parts['path']) && $parts['path'] !== '' && $parts['path'] !== '/')) {
            throw new \InvalidArgumentException(
                'gatewayUrl must be an HTTPS origin without path, query, fragment, or user info.'
            );
        }
        if (!is_string($path) || strpos($path, '/') !== 0) {
            throw new \InvalidArgumentException('path must start with /.');
        }
        $port = isset($parts['port']) ? ':' . $parts['port'] : '';
        return 'https://' . $parts['host'] . $port . $path;
    }
}
