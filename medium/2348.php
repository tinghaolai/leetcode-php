<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function zeroFilledSubarray($nums) {
        $result = 0;
        $acc = 0;
        foreach ($nums as $num) {
            if ($num === 0) {
                $acc++;
                $result += $acc;
            } else {
                $acc = 0;
            }
        }

        return $result;
    }
}