<?php

namespace Client;

/** Standard cURL certificate/hostname verification, using runtime CA configuration. */
final class ApiKeyHttpRPC
{
    public static function post($url, $headers, $body)
    {
        $curl = curl_init();
        try {
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $body,
            ]);
            $response = curl_exec($curl);
            if ($response === false) {
                // cURL messages contain no request headers or credential values.
                throw new \RuntimeException('API Key transport/TLS error ' . curl_errno($curl) . ': ' . curl_error($curl));
            }
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($status !== 200) {
                foreach ($headers as $header) {
                    if (strpos($header, 'Authorization: Bearer ') === 0) {
                        $response = str_replace(substr($header, strlen('Authorization: Bearer ')), '[REDACTED]', $response);
                    }
                }
                throw new \RuntimeException('API Key HTTP status ' . $status . ': ' . $response);
            }
            $result = new \Model\HttpRpcResult();
            $result->setRspBody($response);
            return $result;
        } finally {
            // PHP 7 uses resources; PHP 8 releases CurlHandle objects automatically.
            if (is_resource($curl)) {
                curl_close($curl);
            }
            unset($curl);
        }
    }
}
