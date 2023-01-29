<?php

class Solution {

    /**
     * Runtime: 360 ms, faster than 100.00% of PHP online submissions for Queries on Number of Points Inside a Circle.
    Memory Usage: 20.3 MB, less than 100.00% of PHP online submissions for Queries on Number of Points Inside a Circle.
     *
     * @param Integer[][] $points
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function countPoints($points, $queries) {
        $output = [];
        foreach ($queries as $query) {
            $total = 0;
            foreach ($points as $point) {
                if (pow($point[0] - $query[0], 2) + pow($point[1] - $query[1], 2) <= pow($query[2], 2)) {
                    $total += 1;
                }
            }

            $output[] = $total;
        }

        return $output;
    }
}
