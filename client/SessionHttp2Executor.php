<?php

namespace Client;

final class SessionHttp2Executor
{
    private const SESSION_HEADER = 'X-Session-Id';

    private function __construct()
    {
    }

    public static function execute($gatewayUrl, $request, $extraHeaders)
    {
        $sessionId = self::validateAndGetSessionId($extraHeaders);
        $requestBody = json_encode($request);
        if ($requestBody === false) {
            throw new \RuntimeException('Failed to encode request body: ' . json_last_error_msg());
        }

        $responseBody = Http2JsonTransport::post(
            $gatewayUrl,
            $request->getPath(),
            $sessionId,
            $requestBody
        );
        $response = json_decode($responseBody);
        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Failed to decode response body: ' . json_last_error_msg());
        }
        if (!isset($response->result)) {
            throw new \RuntimeException('Response data error, result field is null, rspBody:' . $responseBody);
        }
        return $response;
    }

    private static function validateAndGetSessionId($extraHeaders)
    {
        $sessionId = null;
        if ($extraHeaders !== null) {
            if (!is_array($extraHeaders)) {
                throw new \InvalidArgumentException('extraHeaders must be an array.');
            }
            foreach ($extraHeaders as $name => $value) {
                if (!is_string($name) || strcasecmp($name, self::SESSION_HEADER) !== 0) {
                    throw new \InvalidArgumentException(
                        'Only X-Session-Id is supported for this API. Unsupported header: ' .
                        (is_scalar($name) ? (string)$name : '<invalid>')
                    );
                }
                if ($sessionId !== null) {
                    throw new \InvalidArgumentException('X-Session-Id must be provided only once.');
                }
                $sessionId = $value;
            }
        }
        if (!is_string($sessionId) || trim($sessionId) === '') {
            throw new \InvalidArgumentException('X-Session-Id cannot be null or blank.');
        }
        if (strpos($sessionId, "\r") !== false || strpos($sessionId, "\n") !== false) {
            throw new \InvalidArgumentException('X-Session-Id cannot contain CR or LF characters.');
        }
        return $sessionId;
    }
}
