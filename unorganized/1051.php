<?php

class Solution {

    /**
     * Runtime: 17 ms, faster than 30.30% of PHP online submissions for Height Checker.
    Memory Usage: 19.1 MB, less than 78.79% of PHP online submissions for Height Checker.
     *
     * @param Integer[] $heights
     * @return Integer
     */
    function heightChecker($heights) {
        $sorted = $heights;
        sort($sorted);
        $count = 0;
        foreach ($heights as $index => $height) {
            if ($height !== $sorted[$index]) {
                $count++;
            }
        }

        return $count;
    }
}