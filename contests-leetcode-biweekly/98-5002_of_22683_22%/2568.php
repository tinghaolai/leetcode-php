<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minImpossibleOR($nums) {
        $nums = array_flip($nums);
        $i = 0;
        while (true) {
            $pow = pow(2, $i);
            if (!array_key_exists($pow, $nums)) {
                return $pow;
            }

            $i++;
        }
    }
}