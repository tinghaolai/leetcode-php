<?php

class Solution {

    /**
     * Runtime: 8 ms, faster than 96.15% of PHP online submissions for Find Peak Element.
    Memory Usage: 15.8 MB, less than 51.92% of PHP online submissions for Find Peak Element.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        foreach ($nums as $index => $num) {
            if (
                (!array_key_exists($index + 1, $nums) || $num > $nums[$index + 1]) &&
                (!array_key_exists($index - 1, $nums) || $num > $nums[$index - 1])
            ) {
                return $index;
            }
        }

        return -1;
    }
}
