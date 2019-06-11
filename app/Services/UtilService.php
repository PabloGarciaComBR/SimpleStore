<?php

namespace SimpleStore\Services;

class UtilService
{
    /**
     * Format a number to currency format
     *
     * @param int|float $amount
     *
     * @return string
     */
    public static function formatCurrency($amount)
    {
        return number_format($amount, 2);
    }
}
