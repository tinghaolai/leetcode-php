<?php

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function minMaxDifference($num) {
        $minString = (string) $num;
        $change = $minString[0];
        for ($i = 0; $i < strlen($minString); $i++) {
            if ($minString[$i] === $change) {
                $minString[$i] = '0';
            }
        }

        $min = (int) $minString;
        $change = null;
        $maxString = (string) $num;
        for ($i = 0; $i < strlen($maxString); $i++) {
            if (is_null($change)) {
                if ($maxString[$i] === '9') {
                    continue;
                }

                $change = $maxString[$i];
                $maxString[$i] = '9';
            } else {
                if ($maxString[$i] === $change) {
                    $maxString[$i] = '9';
                }
            }
        }

        $max = (int) $maxString;

        return $max - $min;
    }
}