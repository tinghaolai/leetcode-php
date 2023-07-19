<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
        usort($intervals, function ($a, $b) {
            return $a[1] - $b[1];
        });

        $result = 0;
        $max = $intervals[0][1];
        $count = count($intervals);
        for ($i = 1; $i < $count; $i++) {
            $current = $intervals[$i];
            if ($intervals[$i][0] >= $max) {
                $max = $current[1];
            } else {
                $result++;
            }
        }

        return $result;
    }
}