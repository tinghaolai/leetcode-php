<?php

class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestPalindromic($num) {
        $count = [];
        for ($i = 0; $i < strlen($num); $i++) {
            if (!isset($count[$num[$i]])) {
                $count[$num[$i]] = 0;
            }

            $count[$num[$i]]++;
        }

        $front = '';
        $mid = '';
        for ($i = 9; $i >= 0; $i--) {
            if (!isset($count[$i])) {
                continue;
            }

            if (
                $count[$i] % 2 === 1 &&
                ($mid === '' || $i > $mid)
            ) {
                    $mid = $i;
            }

            if ($i === 0 && !strlen($front)) {
                continue;
            }

            $front .= str_repeat($i, floor($count[$i] / 2));
        }

        return ($front . $mid . strrev($front)) ?: '0';
    }

    function test()
    {
        dd($this->largestPalindromic('444947137'));
    }
}