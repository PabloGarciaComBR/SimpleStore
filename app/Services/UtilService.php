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

    /**
     * Format an array to format requested by Select component.
     * The input format is: [$key => $value]
     * The output format is: ['value' => $key, 'label' => $value]
     *
     * @param array $data
     *
     * @return array
     */
    public static function formatArrayToSelectReact(array $data)
    {
        foreach ($data as $key => $value) {
            if (!isset($result)) {
                $result = [];
            }

            $result[] = ['value' => $key, 'label' => $value];
        }

        return $result;
    }
}
