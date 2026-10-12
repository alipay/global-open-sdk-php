<?php

namespace Client;

final class RequestTransportResolver
{
    private static $sessionHttp2Routes = [
        ['method' => 'POST', 'path' => '/ams/api/v1/meter/uploadEvent'],
    ];

    private function __construct()
    {
    }

    public static function requiresSessionHttp2($request)
    {
        if ($request === null || !method_exists($request, 'getHttpMethod') || !method_exists($request, 'getPath')) {
            return false;
        }
        foreach (self::$sessionHttp2Routes as $route) {
            if (strcasecmp($request->getHttpMethod(), $route['method']) === 0
                && $request->getPath() === $route['path']) {
                return true;
            }
        }
        return false;
    }

    public static function allowsUnsignedResponse($request)
    {
        // Routes designed to return unsigned responses are currently the same set as the HTTP/2 session routes.
        return self::requiresSessionHttp2($request);
    }
}
