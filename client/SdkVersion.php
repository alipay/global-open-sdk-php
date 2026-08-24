<?php

namespace Client;

final class SdkVersion
{
    public const VERSION = '1.5.6';

    public static function userAgent()
    {
        return 'global-open-sdk-php/' . self::VERSION;
    }
}
