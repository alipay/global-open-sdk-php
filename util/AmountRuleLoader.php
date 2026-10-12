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
        $root = json_decode($contents);
        if (!is_object($root) || json_last_error() !== JSON_ERROR_NONE
            || !isset($root->schemaVersion) || $root->schemaVersion !== 1
            || !isset($root->currencies) || !is_object($root->currencies)
            || !isset($root->antomConstraints) || !is_object($root->antomConstraints)) {
            throw new \RuntimeException('RULE_DATA_ERROR: invalid amount currency rules');
        }
        if (!get_object_vars($root->currencies)) {
            throw new \RuntimeException('RULE_DATA_ERROR: invalid amount currency rules');
        }
        foreach ($root->currencies as $code => $rule) {
            if (!is_object($rule) || !isset($rule->minorUnit)
                || !is_int($rule->minorUnit) || $rule->minorUnit < 0 || $rule->minorUnit > 4) {
                throw new \RuntimeException('RULE_DATA_ERROR: invalid minor unit');
            }
        }
        foreach ($root->antomConstraints as $code => $rule) {
            if (!is_object($rule) || !isset($rule->minorValueMultiple)
                || !is_string($rule->minorValueMultiple)
                || preg_match('/^10*$/D', $rule->minorValueMultiple) !== 1) {
                throw new \RuntimeException('RULE_DATA_ERROR: invalid amount constraint');
            }
        }
        // Preserve the existing associative-array representation after validating JSON object types.
        self::$rules = json_decode($contents, true);
        return self::$rules;
    }

    private function __construct()
    {
    }
}
