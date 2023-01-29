<?php

class Solution {

    /**
     * Runtime: 14 ms, faster than 14.29% of PHP online submissions for Create Target Array in the Given Order.
    Memory Usage: 15.7 MB, less than 14.29% of PHP online submissions for Create Target Array in the Given Order.
     *
     * @param Integer[] $nums
     * @param Integer[] $index
     * @return Integer[]
     */
    function createTargetArray($nums, $index) {
        $output = [];
        foreach ($nums as $i => $num) {
            array_splice( $output, $index[$i], 0, $num);
        }

        return $output;
    }
}
