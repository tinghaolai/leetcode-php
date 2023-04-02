<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function findTheLongestBalancedSubstring($s) {
        $length = strlen($s);
        $result = 0;
        $current = 0;
        $zeroCount = 0;
        for ($i = 0; $i < $length; $i++) {
            $char = $s[$i];
            if ($char === '0') {
                if ($current) {
                    $zeroCount = 0;
                }
                $current = 0;
                $zeroCount++;
                continue;
            }

            $current++;
            $currentResult = min($zeroCount, $current) * 2;
            $result = max($result, $currentResult);
        }

        return $result;
    }
}