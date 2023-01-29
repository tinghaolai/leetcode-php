<?php

class Solution {

    /**
     * Runtime: 47 ms, faster than 60.00% of PHP online submissions for Minimum Operations to Make the Array Increasing.
    Memory Usage: 20.4 MB, less than 20.00% of PHP online submissions for Minimum Operations to Make the Array Increasing.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        $output = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] <= $nums[$i - 1]) {
                $output += $nums[$i - 1] - $nums[$i] + 1;
                $nums[$i] = $nums[$i - 1] + 1;
            }
        }

        return $output;
    }
}
