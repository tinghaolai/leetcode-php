<?php

class Solution {

    /**
     * Runtime: 517 ms, faster than 100.00% of PHP online submissions for Minimize Maximum Pair Sum in Array.
    Memory Usage: 31.6 MB, less than 100.00% of PHP online submissions for Minimize Maximum Pair Sum in Array.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function minPairSum($nums) {
        sort($nums);
        $max = 0;
        $length = count($nums);
        for ($i = 0; $i < $length / 2; $i++) {
            if (($temp = $nums[$i] + $nums[$length - $i - 1]) > $max) {
                $max = $temp;
            }
        }

        return $max;
    }

    function test()
    {
        return $this->minPairSum([3,5,4,2,4,6]);
    }
}
