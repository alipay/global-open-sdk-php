<?php
// Run in a separate process. All cURL functions are mocked; no network access.
namespace Client {
    function curl_init() { return (object) ['options' => []]; }
    function curl_setopt($curl, $option, $value) { $curl->options[$option] = $value; return true; }
    function curl_exec($curl) {
        $fixture = $GLOBALS['entryCodeFixture'];
        $options = $curl->options;
        \entryCodeCheck($options[CURLOPT_SSL_VERIFYPEER] === true && $options[CURLOPT_SSL_VERIFYHOST] === 2, 'TLS options');
        \entryCodeCheck($options[CURLOPT_URL] === 'https://localhost/ams/api/v1/payments/pay', 'Request URL');
        $headers = [];
        foreach ($options[CURLOPT_HTTPHEADER] as $header) {
            list($name, $value) = explode(':', $header, 2);
            $headers[strtolower($name)] = $value;
        }
        $signature = substr($headers['signature'], strpos($headers['signature'], 'signature=') + 10);
        \entryCodeCheck(SignatureTool::verify('POST', '/ams/api/v1/payments/pay', 'local-example',
            $headers['request-time'], $options[CURLOPT_POSTFIELDS], $signature, $fixture['merchantPublic']) === 1, 'Request signature');
        $body = json_decode($options[CURLOPT_POSTFIELDS], true);
        \entryCodeCheck($body['paymentFactor']['inStorePaymentScenario'] === 'EntryCode', 'EntryCode wire value');
        \entryCodeCheck($body['order']['env']['terminalType'] === 'WAP', 'Terminal type');
        $response = '{"result":{"resultStatus":"S","resultCode":"SUCCESS"}}';
        $time = '2026-10-22T00:00:00Z';
        $sign = SignatureTool::sign('POST', '/ams/api/v1/payments/pay', 'local-example', $time, $response, $fixture['platformPrivate']);
        $curl->responseHeaders = "HTTP/1.1 200 OK\r\nresponse-time:" . $time . "\r\nsignature:algorithm=RSA256,keyVersion=1,signature=" . $sign . "\r\n\r\n";
        $GLOBALS['entryCodeSent']++;
        return $curl->responseHeaders . $response;
    }
    function curl_getinfo($curl, $option) {
        if ($option === CURLINFO_HTTP_CODE) { return 200; }
        if ($option === CURLINFO_HEADER_SIZE) { return strlen($curl->responseHeaders); }
        throw new \RuntimeException('Unexpected cURL info');
    }
    function curl_close($curl) {}
}
namespace {
    function entryCodeCheck($ok, $message) { if (!$ok) { throw new \RuntimeException($message); } }
    function entryCodeKeyPair() {
        $key = openssl_pkey_new(['private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA]);
        entryCodeCheck($key !== false && openssl_pkey_export($key, $pem), 'Generate test key');
        return [preg_replace('/-----[^\r\n]+-----|\s+/', '', $pem),
            preg_replace('/-----[^\r\n]+-----|\s+/', '', openssl_pkey_get_details($key)['key'])];
    }
    set_error_handler(function ($severity, $message, $file, $line) {
        if (error_reporting() & $severity) { throw new \ErrorException($message, 0, $severity, $file, $line); }
        return false;
    });
    list($merchantPrivate, $merchantPublic) = entryCodeKeyPair();
    list($platformPrivate, $platformPublic) = entryCodeKeyPair();
    $GLOBALS['entryCodeFixture'] = ['merchantPublic' => $merchantPublic, 'platformPrivate' => $platformPrivate];
    $GLOBALS['entryCodeSent'] = 0;
    putenv('ANTOM_GATEWAY_URL=https://localhost');
    putenv('ANTOM_CLIENT_ID=local-example');
    putenv('ANTOM_MERCHANT_PRIVATE_KEY=' . $merchantPrivate);
    putenv('ANTOM_PUBLIC_KEY=' . $platformPublic);
    ob_start();
    try { require __DIR__ . '/../example/EntryCodePaymentTest.php'; }
    finally { $output = ob_get_clean(); }
    entryCodeCheck($GLOBALS['entryCodeSent'] === 1, 'Example must send exactly one mocked request');
    entryCodeCheck(json_decode($output, true)['result']['resultStatus'] === 'S', 'Verified response');
    entryCodeCheck(strpos($output, $merchantPrivate) === false && strpos($output, $platformPrivate) === false, 'No key output');

    // Preserve the existing required-field rules and error messages.
    $order = $request->getOrder(); $merchant = $order->getMerchant();
    $store = $merchant->getStore(); $env = $order->getEnv();
    foreach ([
        [$request, 'Order', 'order required.'],
        [$order, 'Merchant', 'order.merchant required.'],
        [$order, 'OrderAmount', 'order.orderAmount required.'],
        [$order, 'OrderDescription', 'order.orderDescription required.'],
        [$merchant, 'ReferenceMerchantId', 'order.merchant.referenceMerchantId required.'],
        [$merchant, 'MerchantMCC', 'order.merchant.merchantMcc required.'],
        [$merchant, 'MerchantName', 'order.merchant.merchantName required.'],
        [$merchant, 'Store', 'order.merchant.store required.'],
        [$store, 'ReferenceStoreId', 'order.merchant.store.referenceStoreId required.'],
        [$store, 'StoreName', 'order.merchant.store.storeName required.'],
        [$store, 'StoreMCC', 'order.merchant.store.storeMcc required.'],
        [$order, 'Env', 'order.env required.'],
        [$env, 'UserAgent', 'order.env.userAgent required.'],
    ] as $case) {
        list($object, $field, $message) = $case;
        $getter = 'get' . $field; $setter = 'set' . $field;
        $value = $object->$getter(); $object->$setter(null); $caught = null;
        try { $request->validate(); } catch (\Exception $e) { $caught = $e->getMessage(); }
        finally { $object->$setter($value); }
        entryCodeCheck($caught === $message, 'Required-field regression: ' . $field);
    }
    $request->validate();
    $expiry = '2026-10-23T00:00:00Z';
    $optional = new \Request\pay\EntryCodePaymentRequest('local-expiry', $order, 'USD', 100, null, $expiry);
    entryCodeCheck($optional->getPaymentExpiryTime() === $expiry, 'Optional expiry');
    entryCodeCheck($optional->getPaymentNotifyUrl() === null, 'Optional notification URL');
    json_encode($optional); // No undefined-key warnings from uninitialized parent fields.
    restore_error_handler();
    echo "Entry-code full example and 13 required-field checks: PASS\n";
}
