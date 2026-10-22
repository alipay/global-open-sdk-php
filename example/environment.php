<?php

// Example configuration only. Never print or commit these values.
$config = [];
foreach ([
    'gatewayUrl' => 'ANTOM_GATEWAY_URL',
    'clientId' => 'ANTOM_CLIENT_ID',
    'merchantPrivateKey' => 'ANTOM_MERCHANT_PRIVATE_KEY',
    'alipayPublicKey' => 'ANTOM_PUBLIC_KEY',
] as $field => $variable) {
    $value = getenv($variable);
    if ($value === false || trim($value) === '') {
        throw new RuntimeException('Missing required environment variable: ' . $variable);
    }
    $config[$field] = trim($value);
}

if (strtolower((string) parse_url($config['gatewayUrl'], PHP_URL_SCHEME)) !== 'https'
    || !parse_url($config['gatewayUrl'], PHP_URL_HOST)) {
    throw new RuntimeException('ANTOM_GATEWAY_URL must be an HTTPS gateway URL');
}

// The existing signing API accepts the Base64 key body without PEM markers.
foreach (['merchantPrivateKey', 'alipayPublicKey'] as $field) {
    $config[$field] = preg_replace('/\s+/', '', $config[$field]);
}

return $config;
