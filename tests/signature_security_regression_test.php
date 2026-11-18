<?php
require_once __DIR__ . '/../vendor/autoload.php';
$key = openssl_pkey_new(['private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA]);
if ($key === false || !openssl_pkey_export($key, $pem)) { throw new RuntimeException('Generate test key failed'); }
$private = preg_replace('/-----[^\r\n]+-----|\s+/', '', $pem);
$public = preg_replace('/-----[^\r\n]+-----|\s+/', '', openssl_pkey_get_details($key)['key']);
$client = new \Client\DefaultAlipayClient('https://localhost', $private, $public, 'local-test');
$check = new ReflectionMethod(\Client\BaseAlipayClient::class, 'assertResponseVerified');
if (PHP_VERSION_ID < 80100) { $check->setAccessible(true); }
foreach (['/ams/api/v1/payments/pay', '/ams/api/v1/payments/createPaymentSession'] as $path) {
    $body = '{"result":{"resultStatus":"S"}}'; $time = '2026-10-22T00:00:00Z';
    $sign = \Client\SignatureTool::sign('POST', $path, 'local-test', $time, $body, $private);
    if (\Client\SignatureTool::verify('POST', $path, 'local-test', $time, $body, $sign, $public) !== 1
        || \Client\SignatureTool::verify('POST', $path, 'local-test', $time, $body . ' ', $sign, $public) !== 0) {
        throw new RuntimeException('Signature regression failed');
    }
    $check->invoke($client, false, 'POST', $path, 'local-test', $time, $body, $sign, (object)['resultStatus' => 'S']);
    foreach ([[null, null], [$time, null], [null, $sign]] as $headers) {
        $rejected = false;
        try { $check->invoke($client, false, 'POST', $path, 'local-test', $headers[0], $body, $headers[1], (object)['resultStatus' => 'S']); }
        catch (Exception $e) { $rejected = true; }
        if (!$rejected) { throw new RuntimeException('Unsigned or incomplete response accepted'); }
    }
    foreach (['F','U'] as $status) {
        $check->invoke($client, false, 'POST', $path, 'local-test', null, '{}', null, (object)['resultStatus' => $status]);
    }
}
echo "Signature and response rules: PASS\n";
