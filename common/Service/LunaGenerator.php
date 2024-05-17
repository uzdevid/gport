<?php

namespace common\Service;

class LunaGenerator {
    /**
     * @param int $number
     *
     * @return int
     */
    public static function generate(int $number): int {
        $tempNumber = strrev($number);

        $total = 0;
        for ($i = 0, $iMax = strlen($tempNumber); $i < $iMax; $i++) {
            $digit = (int)$tempNumber[$i];
            if ($i % 2 === 0) {
                $doubleDigit = $digit * 2;
                $total += ($doubleDigit > 9) ? ($doubleDigit - 9) : $doubleDigit;
            } else {
                $total += $digit;
            }
        }

        $lastDigit = (10 - ($total % 10)) % 10;
        return $number . $lastDigit;
    }

    /**
     * @param int $number
     *
     * @return bool
     */
    public static function isValid(int $number): bool {
        $cleanedNumber = preg_replace('/\D/', '', $number);

        if (empty($cleanedNumber) || !is_numeric($cleanedNumber)) {
            return false;
        }

        $reversedNumber = strrev($number);

        $sum = 0;
        for ($i = 0, $iMax = strlen($reversedNumber); $i < $iMax; $i++) {
            $digit = (int)$reversedNumber[$i];

            if ($i % 2 === 1) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        return ($sum % 10) === 0;
    }
}