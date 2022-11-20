<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function unequalTriplets($nums) {
        $count = 0;
        $l = count($nums);
        for ($i = 0; $i < $l; $i++) {
            for ($j = $i + 1; $j < $l; $j++) {
                for ($k = $j + 1; $k < $l; $k++) {
                    if ($nums[$i] !== $nums[$j] && $nums[$j] !== $nums[$k] && $nums[$k] !== $nums[$i]) {
                        $count++;
                    }
                }
            }
        }

        return $count;
    }
}