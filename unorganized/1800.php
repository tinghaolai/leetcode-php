<?php

class Solution {

    /**
     * Runtime: 14 ms, faster than 50.00% of PHP online submissions for Maximum Ascending Subarray Sum.
    Memory Usage: 19.4 MB, less than 50.00% of PHP online submissions for Maximum Ascending Subarray Sum.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAscendingSum($nums) {
        $max = 0;
        $currentMax = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] <= $nums[$i - 1]) {
                $max = max($currentMax, $max);
                $currentMax = $nums[$i];
            } else {
                $currentMax += $nums[$i];
            }
        }

        return max($currentMax, $max);
    }
}
