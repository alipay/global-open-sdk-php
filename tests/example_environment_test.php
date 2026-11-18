<?php
// Run in its own process. Only synthetic values are used; no network requests.
$variables = ['ANTOM_GATEWAY_URL', 'ANTOM_CLIENT_ID', 'ANTOM_MERCHANT_PRIVATE_KEY', 'ANTOM_PUBLIC_KEY'];
$values = ['https://localhost', 'local-test-client', "YWJj\nZGVm", "Z2hp\r\namts"];
foreach ($variables as $variable) { putenv($variable); }
foreach ($variables as $index => $variable) {
    try {
        require __DIR__ . '/../example/environment.php';
        throw new RuntimeException('Missing configuration was accepted');
    } catch (RuntimeException $error) {
        if ($error->getMessage() !== 'Missing required environment variable: ' . $variable) {
            throw new RuntimeException('Unexpected or unsafe missing-variable message');
        }
    }
    putenv($variable . '=' . $values[$index]);
}
$config = require __DIR__ . '/../example/environment.php';
if ($config['merchantPrivateKey'] !== 'YWJjZGVm' || $config['alipayPublicKey'] !== 'Z2hpamts') {
    throw new RuntimeException('Multiline Base64 normalization failed');
}
putenv('ANTOM_GATEWAY_URL=http://localhost');
try {
    require __DIR__ . '/../example/environment.php';
    throw new RuntimeException('Plain HTTP was accepted');
} catch (RuntimeException $error) {
    if ($error->getMessage() !== 'ANTOM_GATEWAY_URL must be an HTTPS gateway URL') {
        throw new RuntimeException('Unexpected or unsafe gateway message');
    }
}
echo "Example environment: PASS\n";
