<?php

class Solution {

    /**
     * Runtime: 27 ms, faster than 80.95% of PHP online submissions for How Many Numbers Are Smaller Than the Current Number.
    Memory Usage: 15.8 MB, less than 23.81% of PHP online submissions for How Many Numbers Are Smaller Than the Current Number.
     *
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums) {
        $sorted = $nums;
        sort($sorted);
        return array_map(function ($num) use ($sorted) {
            return array_search($num, $sorted);
        },$nums);
    }
}
