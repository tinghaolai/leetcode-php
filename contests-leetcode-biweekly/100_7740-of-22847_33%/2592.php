<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximizeGreatness($nums) {
        $nums = array_count_values($nums);
        krsort($nums);
        $currentBiggerCount = 0;
        $result = 0;
        foreach ($nums as $count) {
            $add = min($count, $currentBiggerCount);
            $currentBiggerCount -= $add;
            $result += $add;
            $currentBiggerCount += $count;
        }

        return $result;
    }
}