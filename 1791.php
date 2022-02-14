<?php

class Solution {

    /**
     * Runtime: 332 ms, faster than 100.00% of PHP online submissions for Find Center of Star Graph.
    Memory Usage: 101.3 MB, less than 15.38% of PHP online submissions for Find Center of Star Graph.
     *
     * @param Integer[][] $edges
     * @return Integer
     */
    function findCenter($edges) {
        $count = [];
        foreach ($edges as $edge) {
            foreach ([0, 1] as $index) {
                if (isset($count[$edge[$index]])) {
                    return $edge[$index];
                } else {
                    $count[$edge[$index]] = 1;
                }
            }
        }
    }
}
