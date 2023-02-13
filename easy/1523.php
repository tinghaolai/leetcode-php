<?php

class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function countOdds($low, $high) {
        $result = floor(($high - $low) / 2);
        if ($low % 2 === 1 || $high % 2 === 1) {
            $result++;
        }

        return $result;
    }
}