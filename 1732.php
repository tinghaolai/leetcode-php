<?php

class Solution {

    /**
     * Runtime: 10 ms, faster than 50.00% of PHP online submissions for Find the Highest Altitude.
    Memory Usage: 18.8 MB, less than 50.00% of PHP online submissions for Find the Highest Altitude.
     *
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain) {
        array_unshift($gain, 0);
        for ($i = 1; $i < count($gain); $i++) {
            $gain[$i] += $gain[$i - 1];
        }

        return max($gain);
    }
}
