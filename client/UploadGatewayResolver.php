<?php

namespace Client;

/** Internal resolver for regional OpenApiV2File gateways. */
final class UploadGatewayResolver
{
    private const DEFAULT_GATEWAYS = [
        'open-sea-global.alipay.com' => 'https://open-big-sea.alipay.com',
        'open-sea.alipay.com' => 'https://open-big-sea.alipay.com',
        'open-na-global.alipay.com' => 'https://open-big-na.alipay.com',
        'open-na.alipay.com' => 'https://open-big-na.alipay.com',
        'open-de-global.alipay.com' => 'https://open-big-de-global.alipay.com',
    ];

    public static function resolve($normalGatewayUrl, $explicitUploadGatewayUrl)
    {
        if (is_string($explicitUploadGatewayUrl) && trim($explicitUploadGatewayUrl) !== '') {
            return $explicitUploadGatewayUrl;
        }
        $parts = self::parseGateway($normalGatewayUrl, true);
        $host = strtolower($parts['host']);
        if (!isset(self::DEFAULT_GATEWAYS[$host])) {
            throw new \InvalidArgumentException(
                'No default file gateway mapping exists for ' . $host .
                '. Configure uploadGatewayUrl explicitly.'
            );
        }
        return self::DEFAULT_GATEWAYS[$host];
    }

    public static function normalizeExplicit($uploadGatewayUrl)
    {
        $parts = self::parseGateway($uploadGatewayUrl, false);
        $authority = strtolower($parts['host']);
        if (isset($parts['port'])) {
            $authority .= ':' . $parts['port'];
        }
        return 'https://' . $authority;
    }

    private static function parseGateway($gatewayUrl, $isNormalGateway)
    {
        if (!is_string($gatewayUrl) || trim($gatewayUrl) === '') {
            throw new \InvalidArgumentException('gateway URL cannot be empty');
        }
        $candidate = trim($gatewayUrl);
        if ($isNormalGateway && strpos($candidate, '://') === false) {
            $candidate = 'https://' . $candidate;
        }
        $parts = parse_url($candidate);
        if ($parts === false
            || !isset($parts['scheme'], $parts['host'])
            || strtolower($parts['scheme']) !== 'https') {
            throw new \InvalidArgumentException('gateway URL must be an absolute HTTPS base URL');
        }
        if (isset($parts['user']) || isset($parts['pass'])
            || (isset($parts['path']) && $parts['path'] !== '' && $parts['path'] !== '/')
            || isset($parts['query']) || isset($parts['fragment'])) {
            throw new \InvalidArgumentException(
                'gateway URL must not include user info, path, query, or fragment'
            );
        }
        if ($isNormalGateway && isset($parts['port']) && $parts['port'] !== 443) {
            throw new \InvalidArgumentException(
                'gatewayUrl cannot be mapped to a file gateway; configure uploadGatewayUrl explicitly'
            );
        }
        return $parts;
    }
}
