<?php

namespace Util;

final class AmountUtil
{
    public static function toAmount($amount, $currency): string
    {
        $minorUnit = self::minorUnit($currency);
        self::requireString($amount, 'amount');
        if (!preg_match('/^[0-9]+(?:\.[0-9]+)?$/D', $amount)) {
            self::fail('INVALID_AMOUNT_FORMAT', 'amount must be an unsigned ASCII decimal string');
        }
        $parts = explode('.', $amount, 2);
        $whole = $parts[0];
        $fraction = count($parts) === 2 ? $parts[1] : '';
        if (strlen($fraction) > $minorUnit) {
            $excess = substr($fraction, $minorUnit);
            if (strspn($excess, '0') !== strlen($excess)) {
                self::fail('EXCESS_PRECISION', 'amount exceeds the currency minor unit');
            }
            $fraction = substr($fraction, 0, $minorUnit);
        }
        $fraction = str_pad($fraction, $minorUnit, '0');
        $value = ltrim($whole . $fraction, '0');
        $value = $value === '' ? '0' : $value;
        self::validateCanonical($value, $currency);
        return $value;
    }

    public static function fromAmount($value, $currency): string
    {
        $minorUnit = self::minorUnit($currency);
        self::validateValueFormat($value);
        $canonical = ltrim($value, '0');
        $canonical = $canonical === '' ? '0' : $canonical;
        if ($minorUnit === 0) {
            return $canonical;
        }
        $padded = str_pad($canonical, $minorUnit + 1, '0', STR_PAD_LEFT);
        return substr($padded, 0, -$minorUnit) . '.' . substr($padded, -$minorUnit);
    }

    public static function validate($value, $currency): void
    {
        self::minorUnit($currency);
        self::validateValueFormat($value);
        self::validateCanonical($value, $currency);
    }

    private static function minorUnit($currency): int
    {
        self::requireString($currency, 'currency');
        if (!preg_match('/^[A-Z]{3}$/D', $currency)) {
            self::fail('INVALID_CURRENCY', 'currency must be three uppercase ASCII letters');
        }
        $rules = AmountRuleLoader::rules();
        if (!array_key_exists($currency, $rules['currencies'])) {
            self::fail('UNKNOWN_CURRENCY', 'currency is not present in the ISO snapshot');
        }
        $minorUnit = $rules['currencies'][$currency]['minorUnit'];
        if ($minorUnit === null) {
            self::fail('UNSUPPORTED_MINOR_UNIT', 'currency has no numeric minor unit');
        }
        if (!is_int($minorUnit) || $minorUnit < 0 || $minorUnit > 4) {
            throw new \RuntimeException('RULE_DATA_ERROR: invalid minor unit');
        }
        return $minorUnit;
    }

    private static function validateValueFormat($value): void
    {
        self::requireString($value, 'value');
        if (!preg_match('/^[0-9]+$/D', $value)) {
            self::fail('INVALID_VALUE_FORMAT', 'value must contain ASCII digits only');
        }
        if (strlen($value) > 16) {
            self::fail('VALUE_TOO_LONG', 'value exceeds 16 digits');
        }
    }

    private static function validateCanonical(string $value, string $currency): void
    {
        if (strspn($value, '0') === strlen($value)) {
            self::fail('AMOUNT_NOT_POSITIVE', 'value must be greater than zero');
        }
        if (strlen($value) > 16) {
            self::fail('VALUE_TOO_LONG', 'value exceeds 16 digits');
        }
        $rules = AmountRuleLoader::rules();
        if (isset($rules['antomConstraints'][$currency])) {
            $multiple = $rules['antomConstraints'][$currency]['minorValueMultiple'];
            if (!is_string($multiple) || !preg_match('/^10*$/D', $multiple)) {
                throw new \RuntimeException('RULE_DATA_ERROR: invalid amount constraint');
            }
            $suffix = substr($multiple, 1);
            if ($suffix !== '' && substr($value, -strlen($suffix)) !== $suffix) {
                self::fail('RULE_VIOLATION', 'value does not satisfy the Antom currency constraint');
            }
        }
    }

    private static function requireString($value, string $name): void
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('INVALID_ARGUMENT_TYPE: ' . $name . ' must be a string');
        }
    }

    private static function fail(string $category, string $detail): void
    {
        throw new \InvalidArgumentException($category . ': ' . $detail);
    }

    private function __construct()
    {
    }
}
