<?php

class Solution {

    /**
     * Runtime: 66 ms, faster than 63.16% of PHP online submissions for Find Pivot Index.
    Memory Usage: 20.7 MB, less than 5.26% of PHP online submissions for Find Pivot Index.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums) {
        $left = 0;
        $right = array_sum($nums);
        foreach ($nums as $index => $num) {
            $right -= $num;
            if ($right === $left) {
                return $index;
            }

            $left += $num;
        }

        return -1;
    }
}
