<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
        usort($intervals, function ($a, $b) {
            if ($a[1] == $b[1]) {
                return $a[0] - $b[0];
            }

            return $a[1] - $b[1];
        });

        $result = 0;
        $min = $intervals[0][0];
        $max = $intervals[0][1];
        $count = count($intervals);
        for ($i = 1; $i < $count; $i++) {
            $current = $intervals[$i];
            if ($current[0] >= $max || $current[1] <= $min) {
                $min = min($min, $current[0]);
                $max = max($max, $current[1]);
            } else {
                $result++;
            }
        }

        return $result;
    }
}