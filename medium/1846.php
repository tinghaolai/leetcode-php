<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function maximumElementAfterDecrementingAndRearranging($arr) {
        sort($arr);
        $length = count($arr);
        $result = 1;
        for ($i = 1; $i < $length; $i++) {
            $current = $arr[$i];
            if ($current <= $result) {
                continue;
            }

            $result++;
        }

        return $result;
    }
}