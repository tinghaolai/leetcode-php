<?php

class Solution {

    /**
     * Runtime: 70 ms, faster than 100.00% of PHP online submissions for Queries on a Permutation With Key.
    Memory Usage: 15.8 MB, less than 100.00% of PHP online submissions for Queries on a Permutation With Key.
     *
     * @param Integer[] $queries
     * @param Integer $m
     * @return Integer[]
     */
    function processQueries($queries, $m) {
        $permutation = range(1, $m);
        $output = [];
        foreach ($queries as $number) {
            $index = array_search($number, $permutation);
            $output[] = $index;
            array_splice($permutation, $index, 1);
            array_unshift($permutation, $number);
        }

        return $output;
    }
}
