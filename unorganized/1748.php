<?php

class Solution {

    /**
     * Runtime: 0 ms, faster than 100.00% of PHP online submissions for Sum of Unique Elements.
    Memory Usage: 19.2 MB, less than 28.57% of PHP online submissions for Sum of Unique Elements.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function sumOfUnique($nums) {
        return array_sum(array_keys(array_filter(array_count_values($nums), function ($value) {
            return $value === 1;
        })));
    }
}
