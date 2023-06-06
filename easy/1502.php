<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canMakeArithmeticProgression($arr) {
        sort($arr);
        $length = count($arr);
        if ($length === 1) {
            return true;
        }

        $diff = $arr[1] - $arr[0];
        for ($i = 1; $i < $length - 1; $i++) {
            if ($arr[$i + 1] - $arr[$i] !== $diff) {
                return false;
            }
        }
        return true;
    }
}