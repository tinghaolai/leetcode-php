<?php

class Solution {

    /**
     * Runtime: 543 ms, faster than 100.00% of PHP online submissions for Finding the Users Active Minutes.
    Memory Usage: 38.2 MB, less than 100.00% of PHP online submissions for Finding the Users Active Minutes.
     *
     * @param Integer[][] $logs
     * @param Integer $k
     * @return Integer[]
     */
    function findingUsersActiveMinutes($logs, $k) {
        $output = array_fill(0, $k, 0);
        $activities = [];
        foreach ($logs as $log) {
            if (!isset($activities[$log[0]][$log[1]])) {
                $activities[$log[0]][$log[1]] = 1;
            }
        }

        foreach ($activities as $activity) {
            $output[array_sum($activity) - 1]++;
        }

        return $output;
    }
}
