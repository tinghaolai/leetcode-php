<?php

class Solution {

    /**
     * Runtime: 22 ms, faster than 18.18% of PHP online submissions for Kids With the Greatest Number of Candies.
    Memory Usage: 15.6 MB, less than 50.00% of PHP online submissions for Kids With the Greatest Number of Candies.
     *
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $max = max($candies);
        return array_map(function ($candy) use ($max, $extraCandies) {
            return $candy + $extraCandies >= $max;
        }, $candies);
    }
}
