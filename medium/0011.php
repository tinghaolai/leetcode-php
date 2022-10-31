<?php

class Solution {

    /**
     * Runtime: 690 ms, faster than 6.25% of PHP online submissions for Container With Most Water.
    Memory Usage: 32.4 MB, less than 5.21% of PHP online submissions for Container With Most Water.
     *
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $max = 0;
        $left = 0;
        $right = count($height) - 1;
        while ($right > $left) {
            $max = max($max, ($right - $left) * min($height[$left], $height[$right]));
            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }

        return $max;
    }

    function test()
    {
        dd(
            $this->maxArea([1,8,6,2,5,4,8,3,7])
        );
    }
}