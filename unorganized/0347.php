<?php

class Solution {

    /**
     * Runtime: 68 ms, faster than 6.82% of PHP online submissions for Top K Frequent Elements.
    Memory Usage: 23.7 MB, less than 47.73% of PHP online submissions for Top K Frequent Elements.
     *
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $numCounts = array_count_values($nums);
        uasort($numCounts, function ($a, $b) {
            return $a < $b;
        });
        $output = [];

        foreach ($numCounts as $key => $count) {
            $output[] = $key;
            if (count($output) === $k) {
                break;
            }
        }

        return $output;
    }
}
