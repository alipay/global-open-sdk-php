<?php

namespace Client;

/** Instance-local authentication for ordinary OpenAPI v2 requests. */
final class ApiKeyAuth
{
    private $key;
    private $sandbox;
    private $clientId;

    public function __construct($gatewayUrl, $apiKey)
    {
        $url = is_string($gatewayUrl) ? parse_url($gatewayUrl) : false;
        if (!$url || !isset($url['scheme'], $url['host']) || $url['scheme'] !== 'https'
            || $url['host'] === '' || isset($url['user']) || isset($url['pass'])
            || isset($url['query']) || isset($url['fragment'])
            || (isset($url['path']) && $url['path'] !== '' && $url['path'] !== '/')) {
            throw new \InvalidArgumentException('API Key requires an absolute HTTPS gateway without credentials, path, query or fragment');
        }
        $parts = is_string($apiKey) ? explode('_', $apiKey, 4) : [];
        if (count($parts) !== 4 || !in_array($parts[0], ['isak', 'irak'], true)
            || !in_array($parts[1], ['TEST', 'PROD'], true)
            || !preg_match('/\A[A-Za-z0-9+\/]+\z/', $parts[2])
            || !preg_match('/\A[A-Za-z0-9_-]+\z/', $parts[3])) {
            throw new \InvalidArgumentException('Invalid API Key format; expected Standard or Restricted TEST/PROD key');
        }
        $decoded = base64_decode($parts[2] . str_repeat('=', (4 - strlen($parts[2]) % 4) % 4), true);
        if ($decoded === false || $decoded === '' || !preg_match('//u', $decoded)
            || rtrim(base64_encode($decoded), '=') !== $parts[2]) {
            throw new \InvalidArgumentException('Invalid API Key client ID encoding');
        }
        $this->key = $apiKey;
        $this->sandbox = $parts[1] === 'TEST';
        $this->clientId = $decoded;
    }

    public function clientId() { return $this->clientId; }
    public function authorization() { return 'Bearer ' . $this->key; }
    public function redact($text) { return str_replace($this->key, '[REDACTED]', $text); }
    public function __debugInfo() { return ['authentication' => 'API Key']; }

    public function path($path)
    {
        if (is_string($path) && strpos($path, '/ams/sandbox/api/') === 0) {
            $path = '/ams/api/' . substr($path, strlen('/ams/sandbox/api/'));
        }
        if (!is_string($path) || strpos($path, '/ams/api/') !== 0 || strpbrk($path, '?#') !== false) {
            throw new \InvalidArgumentException('API Key requires an ordinary /ams/api/ request path');
        }
        return $this->sandbox ? '/ams/sandbox/api/' . substr($path, strlen('/ams/api/')) : $path;
    }
}
