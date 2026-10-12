<?php

namespace Client;

/** Internal authentication helper. The identity fragment is opaque. */
final class ApiKeyAuth
{
    private $apiKey;
    private $sandbox;
    private $gatewayUrl;
    private static $reservedHeaders = [
        'authorization', 'signature', 'client-id', 'request-time', 'key-version', 'keyversion',
        'agent-token', 'content-type', 'user-agent', 'x-sdkversion', 'sdk-version',
        'host', 'content-length', 'transfer-encoding', 'connection', 'proxy-authorization',
    ];

    public function __construct($gatewayUrl, $apiKey)
    {
        if (!is_string($apiKey) || !preg_match('/\A(?:isak|irak)_(?:TEST|PROD)_[^_\s\x00-\x1f\x7f]+_[^\s\x00-\x1f\x7f]+\z/', $apiKey)) {
            throw new \InvalidArgumentException('apiKey must be a Standard or Restricted TEST/PROD key');
        }
        $uri = is_string($gatewayUrl) ? parse_url($gatewayUrl) : false;
        if (!$uri || !isset($uri['scheme'], $uri['host']) || strtolower($uri['scheme']) !== 'https'
            || isset($uri['user']) || isset($uri['pass']) || isset($uri['query']) || isset($uri['fragment'])
            || (isset($uri['path']) && $uri['path'] !== '/' && $uri['path'] !== '')
            || preg_match('/\s/', $gatewayUrl)) {
            throw new \InvalidArgumentException('gatewayUrl must be an HTTPS base URL');
        }
        $this->gatewayUrl = rtrim($gatewayUrl, '/');
        $this->apiKey = $apiKey;
        $this->sandbox = explode('_', $apiKey, 3)[1] === 'TEST';
    }

    public function gatewayUrl()
    {
        return $this->gatewayUrl;
    }
    public function authorization()
    {
        return 'Bearer ' . $this->apiKey;
    }
    public function redact($message)
    {
        return str_replace($this->apiKey, '[REDACTED]', $message);
    }
    public function __debugInfo()
    {
        return ['gatewayUrl' => $this->gatewayUrl, 'apiKey' => '[REDACTED]'];
    }

    public function path($path)
    {
        if (!is_string($path) || !preg_match('#\A/ams/(?:sandbox/)?api/[A-Za-z0-9_/-]+\z#', $path) || strpos($path, '//') !== false) {
            throw new \InvalidArgumentException('request path must be an ordinary /ams/api/ path');
        }
        $normal = preg_replace('#^/ams/sandbox/api/#', '/ams/api/', $path);
        return $this->sandbox ? preg_replace('#^/ams/api/#', '/ams/sandbox/api/', $normal) : $normal;
    }

    public static function extraHeaders($extraHeaders)
    {
        $headers = [];
        foreach ($extraHeaders as $name => $value) {
            if (!is_string($name) || !preg_match('/\A[!#$%&\'*+.^_`|~0-9A-Za-z-]+\z/', $name)
                || !is_string($value) || strpbrk($value, "\r\n") !== false) {
                throw new \InvalidArgumentException('Invalid custom header');
            }
            if (!in_array(strtolower($name), self::$reservedHeaders, true)) {
                $headers[] = $name . ':' . $value;
            }
        }
        return $headers;
    }
}
