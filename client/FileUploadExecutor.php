<?php

namespace Client;

use Request\billing\AlipayProductUploadImageRequest;
use Response\billing\AlipayProductUploadImageResponse;

/** Internal execution path for SDK-provided OpenApiV2File requests. */
final class FileUploadExecutor
{
    private const PRODUCT_IMAGE_PATH = '/ams/api/v1/billing/product/uploadImage';
    private const PRODUCT_IMAGE_MAX_SIZE = 2097152;

    public static function execute($request, array $clientConfig)
    {
        if (get_class($request) !== AlipayProductUploadImageRequest::class) {
            throw new \InvalidArgumentException('Only SDK-provided file upload requests are supported');
        }
        $productId = $request->getProductId();
        if (!is_string($productId) || trim($productId) === '') {
            throw new \InvalidArgumentException("productId can't be empty");
        }
        if (strlen($productId) > 64) {
            throw new \InvalidArgumentException('productId length cannot exceed 64 characters');
        }

        list($fileContent, $fileName, $contentType) = self::readProductImage($request->getFile());
        $requestBody = json_encode(
            [
                'productId' => $productId,
                'fileSha256' => hash('sha256', $fileContent),
            ],
            JSON_UNESCAPED_SLASHES
        );
        if ($requestBody === false) {
            throw new \RuntimeException('Unable to encode the file request body');
        }

        $clientId = $request->getClientId();
        if (!is_string($clientId) || trim($clientId) === '') {
            $clientId = $clientConfig['clientId'];
        }
        if (!is_string($clientId) || trim($clientId) === '') {
            throw new \InvalidArgumentException("clientId can't be empty");
        }
        $path = self::resolvePath(self::PRODUCT_IMAGE_PATH, strpos($clientId, 'SANDBOX_') === 0);
        $gateway = UploadGatewayResolver::resolve(
            $clientConfig['gatewayUrl'],
            $clientConfig['uploadGatewayUrl']
        );
        $requestTime = date(DATE_ISO8601);
        $signature = SignatureTool::sign(
            'POST',
            $path,
            $clientId,
            $requestTime,
            $requestBody,
            $clientConfig['merchantPrivateKey']
        );
        $keyVersion = $request->getKeyVersion();
        if ($keyVersion === null || $keyVersion === '') {
            $keyVersion = BaseAlipayClient::DEFAULT_KEY_VERSION;
        }
        $headers = self::buildHeaders(
            $requestTime,
            $clientId,
            $keyVersion,
            $signature,
            $clientConfig['agentToken'],
            $clientConfig['customHeaders']
        );

        $response = MultipartHttpRPC::send(
            $gateway . $path,
            $headers,
            $requestBody,
            ['file', 'imageFile'],
            $fileName,
            $contentType,
            $fileContent
        );
        $responseBody = $response->getRspBody();
        $decoded = json_decode($responseBody, true);
        if (!is_array($decoded) || !isset($decoded['result']) || !is_array($decoded['result'])) {
            throw new \RuntimeException('File response result field is missing');
        }

        $responseSignature = $response->getRspSign();
        $responseTime = $response->getRspTime();
        $signatureMissing = !is_string($responseSignature) || trim($responseSignature) === '';
        $responseTimeMissing = !is_string($responseTime) || trim($responseTime) === '';
        if ($signatureMissing && $responseTimeMissing) {
            if (($decoded['result']['resultStatus'] ?? null) !== 'F') {
                throw new \RuntimeException('Unsigned file response is not a failure response');
            }
        } elseif ($signatureMissing || $responseTimeMissing) {
            throw new \RuntimeException('File response must contain both Signature and Response-Time');
        } elseif (!SignatureTool::verify(
            'POST',
            $path,
            $clientId,
            $responseTime,
            $responseBody,
            $responseSignature,
            $clientConfig['alipayPublicKey']
        )) {
            throw new \RuntimeException('File response signature verification failed');
        }

        return new AlipayProductUploadImageResponse($decoded);
    }

    private static function readProductImage($file)
    {
        if ($file instanceof \CURLFile) {
            $path = $file->getFilename();
            if (!is_file($path) || !is_readable($path)) {
                throw new \InvalidArgumentException('CURLFile must reference a readable regular file');
            }
            $stream = fopen($path, 'rb');
            if ($stream === false) {
                throw new \RuntimeException('Unable to open CURLFile');
            }
            try {
                $content = self::readBounded($stream);
            } finally {
                fclose($stream);
            }
            $fileName = $file->getPostFilename();
            if (!is_string($fileName) || trim($fileName) === '') {
                $fileName = basename($path);
            }
            $contentType = $file->getMimeType();
        } elseif (is_resource($file) && get_resource_type($file) === 'stream') {
            $metadata = stream_get_meta_data($file);
            $path = isset($metadata['uri']) ? $metadata['uri'] : null;
            if (!is_string($path) || !is_file($path)) {
                throw new \InvalidArgumentException('file must be a readable plain-file stream');
            }
            $position = ftell($file);
            $content = self::readBounded($file);
            if ($position !== false && fseek($file, $position, SEEK_SET) !== 0) {
                throw new \RuntimeException('Unable to restore file stream position');
            }
            $fileName = basename($path);
            $contentType = function_exists('mime_content_type') ? @mime_content_type($path) : false;
        } else {
            throw new \InvalidArgumentException('file must be a CURLFile or readable plain-file stream');
        }
        if (!is_string($fileName) || trim($fileName) === '') {
            throw new \InvalidArgumentException('filename cannot be empty');
        }
        if (!is_string($contentType) || trim($contentType) === '') {
            $contentType = 'application/octet-stream';
        }
        $fileName = self::normalizeFileName($fileName);
        if ($fileName === '') {
            throw new \InvalidArgumentException('filename cannot be empty');
        }
        return [$content, $fileName, $contentType];
    }

    private static function normalizeFileName($fileName)
    {
        $baseName = basename(str_replace('\\', '/', $fileName));
        return preg_replace('/[\x00-\x1F\x7F"]/', '_', $baseName);
    }

    private static function readBounded($stream)
    {
        $content = stream_get_contents($stream, self::PRODUCT_IMAGE_MAX_SIZE + 1);
        if ($content === false) {
            throw new \RuntimeException('Unable to read file');
        }
        if (strlen($content) === 0) {
            throw new \InvalidArgumentException("file can't be empty");
        }
        if (strlen($content) > self::PRODUCT_IMAGE_MAX_SIZE) {
            throw new \InvalidArgumentException(
                'file size cannot exceed ' . self::PRODUCT_IMAGE_MAX_SIZE . ' bytes'
            );
        }
        return $content;
    }

    private static function resolvePath($path, $sandbox)
    {
        return $sandbox ? preg_replace('/\/ams\/api/', '/ams/sandbox/api', $path, 1) : $path;
    }

    private static function buildHeaders(
        $requestTime,
        $clientId,
        $keyVersion,
        $signature,
        $agentToken,
        $customHeaders
    ) {
        $headers = [
            'User-Agent:' . SdkVersion::userAgent(),
            'Request-Time:' . $requestTime,
            'client-id:' . $clientId,
            'Signature:algorithm=RSA256,keyVersion=' . $keyVersion . ',signature=' . $signature,
        ];
        if (is_string($agentToken) && $agentToken !== '') {
            $headers[] = 'agent-token:' . $agentToken;
        }
        if (is_array($customHeaders)) {
            $reservedHeaders = [
                'signature' => true,
                'client-id' => true,
                'request-time' => true,
                'content-type' => true,
                'agent-token' => true,
                'user-agent' => true,
            ];
            foreach ($customHeaders as $header) {
                if (!is_string($header)) {
                    continue;
                }
                $separator = strpos($header, ':');
                $name = $separator === false ? '' : strtolower(trim(substr($header, 0, $separator)));
                if ($name !== '' && !isset($reservedHeaders[$name])) {
                    $headers[] = $header;
                }
            }
        }
        return $headers;
    }
}
