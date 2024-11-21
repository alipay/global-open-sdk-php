<?php

namespace Client;

class SignatureTool
{

    static public function sign($httpMethod, $path, $clientId, $reqTime, $content, $merchantPrivateKey)
    {
        $signContent = self::genSignContent($httpMethod, $path, $clientId, $reqTime, $content);
        $signValue = self::signWithSHA256RSA($signContent, $merchantPrivateKey);
        return urlencode($signValue);
    }

    static public function verify($httpMethod, $path, $clientId, $rspTime, $rspBody, $signature, $alipayPublicKey)
    {
        $rspContent = self::genSignContent($httpMethod, $path, $clientId, $rspTime, $rspBody);
        return self::verifySignatureWithSHA256RSA($rspContent, $signature, $alipayPublicKey);
    }

    static private function genSignContent($httpMethod, $path, $clientId, $timeString, $content)
    {
        $payload = $httpMethod . " " . $path . "\n" . $clientId . "." . $timeString . "." . $content;
        return $payload;
    }

    static private function signWithSHA256RSA($signContent, $merchantPrivateKey)
    {
        $priKey = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($merchantPrivateKey, 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";

        openssl_sign($signContent, $signValue, $priKey, OPENSSL_ALGO_SHA256);
        return base64_encode($signValue);
    }

    static private function verifySignatureWithSHA256RSA($rspContent, $rspSignValue, $alipayPublicKey)
    {
        $pubKey = "-----BEGIN PUBLIC KEY-----\n" .
            wordwrap($alipayPublicKey, 64, "\n", true) .
            "\n-----END PUBLIC KEY-----";
        if (strstr($rspSignValue, "=")
            || strstr($rspSignValue, "+")
            || strstr($rspSignValue, "/")
            || $rspSignValue == base64_encode(base64_decode($rspSignValue))) {
            $originalRspSignValue = base64_decode($rspSignValue);
        } else {
            $originalRspSignValue = base64_decode(urldecode($rspSignValue));
        }
        return openssl_verify($rspContent, $originalRspSignValue, $pubKey, OPENSSL_ALGO_SHA256);
    }

}