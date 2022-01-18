<?php

class Solution {

    /**
     * Runtime: 492 ms, faster than 26.79% of PHP online submissions for K Closest Points to Origin.
    Memory Usage: 29.4 MB, less than 92.86% of PHP online submissions for K Closest Points to Origin.
     *
     * @param Integer[][] $points
     * @param Integer $k
     * @return Integer[][]
     */
    function kClosest($points, $k) {
        $points = array_map(function ($point) {
            return [
                'distance' => abs($point[0] * $point[0]) + abs($point[1] * $point[1]),
                'origin'   => $point,
            ];
        }, $points);

        usort($points, function ($a, $b) {
            return $a['distance'] > $b['distance'];
        });

        return array_column(array_slice($points, 0, $k), 'origin');
    }
}
