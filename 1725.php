<?php

class Solution {

    /**
     * Runtime: 103 ms, faster than 50.00% of PHP online submissions for Number Of Rectangles That Can Form The Largest Square.
    Memory Usage: 17 MB, less than 100.00% of PHP online submissions for Number Of Rectangles That Can Form The Largest Square.
     *
     * @param Integer[][] $rectangles
     * @return Integer
     */
    function countGoodRectangles($rectangles) {
        $count = 0;
        $max = 0;
        foreach ($rectangles as $rectangle) {
            $currentMax = min($rectangle);
            if ($currentMax > $max) {
                $max = $currentMax;
                $count = 1;
            } else if ($currentMax === $max) {
                $count++;
            }
        }

        return $count;
    }
}
