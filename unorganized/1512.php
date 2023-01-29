<?php

class Solution {

    /**
     * Runtime: 7 ms, faster than 86.36% of PHP online submissions for Number of Good Pairs.
    Memory Usage: 15.6 MB, less than 81.82% of PHP online submissions for Number of Good Pairs.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        return array_sum(array_map(function ($count) {
            return ($count -1) * $count / 2;
        }, array_count_values($nums)));
    }
}
