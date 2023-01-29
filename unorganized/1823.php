<?php

class Solution {

    /**
     * Runtime: 61 ms, faster than 33.33% of PHP online submissions for Find the Winner of the Circular Game.
    Memory Usage: 15.8 MB, less than 33.33% of PHP online submissions for Find the Winner of the Circular Game.
     *
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findTheWinner($n, $k) {
        $circle = range(1, $n);
        $currentIndex = 0;
        while (count($circle) > 1) {
            $spliceIndex = ($currentIndex + $k - 1) % count($circle);
            array_splice($circle, $spliceIndex, 1);
            $currentIndex = $spliceIndex;
        }

        return $circle[0];
    }
}
