<?php

class Solution {

    /**
     * Runtime: 25 ms, faster than 75.00% of PHP online submissions for Destination City.
    Memory Usage: 19.4 MB, less than 25.00% of PHP online submissions for
     *
     * @param String[][] $paths
     * @return String
     */
    function destCity($paths) {
        $starts    = [];
        $destinies = [];
        foreach ($paths as $path) {
            $starts[$path[0]] = true;
            if (!isset($starts[$path[1]])) {
                $destinies[$path[1]] = true;
            }

            unset($destinies[$path[0]]);
        }

        return array_keys($destinies)[0];
    }
}
