<?php

namespace Util;

final class AmountRuleLoader
{
    private static $rules;

    public static function rules(): array
    {
        if (self::$rules !== null) {
            return self::$rules;
        }
        $path = __DIR__ . '/resources/amount-currency-rules.json';
        $contents = @file_get_contents($path);
        if ($contents === false) {
            throw new \RuntimeException('RULE_DATA_ERROR: amount currency rules resource is missing');
        }
        $rules = json_decode($contents, true);
        if (!is_array($rules) || json_last_error() !== JSON_ERROR_NONE
            || !isset($rules['schemaVersion']) || $rules['schemaVersion'] !== 1
            || !isset($rules['currencies']) || !is_array($rules['currencies'])
            || !isset($rules['antomConstraints']) || !is_array($rules['antomConstraints'])) {
            throw new \RuntimeException('RULE_DATA_ERROR: invalid amount currency rules');
        }
        self::$rules = $rules;
        return self::$rules;
    }

    private function __construct()
    {
    }
}
