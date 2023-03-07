<?php

class Solution {

    /**
     * @param Integer[] $time
     * @param Integer $totalTrips
     * @return Integer
     */
    function minimumTime($time, $totalTrips) {
        $left = 1;
        $right = max($time) * $totalTrips;
        while ($left < $right) {
            $mid = (int) (($right + $left) / 2);
            $trips = 0;
            foreach ($time as $val) {
                $trips = $trips + (int) ($mid / $val);
            }

            if ($trips >= $totalTrips) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }
}