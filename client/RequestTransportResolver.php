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
}
