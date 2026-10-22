<?php
// Run in its own process: php tests/default_tls_test.php. No network requests.
namespace Client {
    function curl_init() { return new \stdClass(); }
    function curl_setopt($curl, $option, $value) {
        $GLOBALS['transportOptions'][$option] = $value;
        return true;
    }
    function curl_exec($curl) { return "HTTP/1.1 200 OK\r\n\r\n{}"; }
    function curl_getinfo($curl, $option) {
        if ($option === CURLINFO_HTTP_CODE) { return 200; }
        if ($option === CURLINFO_HEADER_SIZE) { return strlen("HTTP/1.1 200 OK\r\n\r\n"); }
        throw new \RuntimeException('Unexpected cURL info option');
    }
    function curl_close($curl) {}
}
namespace {
    require_once __DIR__ . '/../vendor/autoload.php';
    class TlsOptionsTestClient extends \Client\DefaultAlipayClient {
        public function probe() {
            return $this->sendRequest('https://localhost/local-test', 'POST', [], '{}');
        }
    }
    $GLOBALS['transportOptions'] = [];
    $client = new TlsOptionsTestClient('https://localhost', '', '');
    $result = $client->probe();
    $options = $GLOBALS['transportOptions'];
    if (($options[CURLOPT_SSL_VERIFYPEER] ?? null) !== true
        || ($options[CURLOPT_SSL_VERIFYHOST] ?? null) !== 2
        || array_key_exists(CURLOPT_CAINFO, $options)
        || $result->getRspBody() !== '{}') {
        throw new \RuntimeException('Default TLS options regression');
    }
    echo "Default TLS options: PASS\n";
}
