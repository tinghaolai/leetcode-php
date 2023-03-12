<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxScore($nums) {
        rsort($nums);
        $result = 0;
        $current = 0;
        foreach ($nums as $num) {
            $current += $num;
            if ($current > 0) {
                $result++;
            }
        }

        return $result;
    }
}