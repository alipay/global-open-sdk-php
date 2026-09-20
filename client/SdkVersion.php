<?php

namespace Client;

final class SdkVersion
{
    public const VERSION = '1.6.1';

    public static function userAgent()
    {
        return 'global-open-sdk-php/' . self::VERSION;
    }
}
