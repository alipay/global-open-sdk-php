<?php

namespace Client;

/** Internal cURL transport for bounded multipart file uploads. */
final class MultipartHttpRPC
{
    public static function send(
        $requestUrl,
        array $headers,
        $requestBody,
        array $filePartNames,
        $fileName,
        $contentType,
        $fileContent
    ) {
        $temporaryPath = tempnam(sys_get_temp_dir(), 'antom-upload-');
        if ($temporaryPath === false) {
            throw new \RuntimeException('Unable to create a temporary upload file');
        }
        try {
            @chmod($temporaryPath, 0600);
            if (file_put_contents($temporaryPath, $fileContent, LOCK_EX) !== strlen($fileContent)) {
                throw new \RuntimeException('Unable to prepare the temporary upload file');
            }
            $postFields = ['body' => $requestBody];
            foreach ($filePartNames as $filePartName) {
                $postFields[$filePartName] = new \CURLFile(
                    $temporaryPath,
                    $contentType,
                    self::sanitizeFileName($fileName)
                );
            }

            $responseHeaders = [];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $requestUrl);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge($headers, ['Accept:application/json']));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_HEADERFUNCTION, function ($curlHandle, $headerLine) use (&$responseHeaders) {
                $length = strlen($headerLine);
                $separator = strpos($headerLine, ':');
                if ($separator !== false) {
                    $name = strtolower(trim(substr($headerLine, 0, $separator)));
                    $responseHeaders[$name] = trim(substr($headerLine, $separator + 1));
                }
                return $length;
            });

            $responseBody = curl_exec($curl);
            if ($responseBody === false) {
                $error = curl_error($curl);
                self::closeCurl($curl);
                throw new \RuntimeException('File upload request failed: ' . $error);
            }
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            self::closeCurl($curl);
            if ($statusCode !== 200) {
                throw new \RuntimeException(
                    'Invalid HTTP status ' . $statusCode . ', response body: ' . $responseBody
                );
            }

            $result = new \Model\HttpRpcResult();
            $result->setRspBody($responseBody);
            if (isset($responseHeaders['response-time'])) {
                $result->setRspTime($responseHeaders['response-time']);
            }
            if (isset($responseHeaders['signature'])) {
                $signature = $responseHeaders['signature'];
                $position = strrpos($signature, 'signature=');
                $result->setRspSign(
                    $position === false ? $signature : substr($signature, $position + strlen('signature='))
                );
            }
            return $result;
        } finally {
            @unlink($temporaryPath);
        }
    }

    private static function closeCurl($curl)
    {
        if (PHP_VERSION_ID < 80000) {
            curl_close($curl);
        }
    }

    private static function sanitizeFileName($fileName)
    {
        $baseName = basename(str_replace('\\', '/', $fileName));
        $safeName = preg_replace('/[\x00-\x1F\x7F"]/', '_', $baseName);
        return $safeName === '' ? 'file' : $safeName;
    }
}
