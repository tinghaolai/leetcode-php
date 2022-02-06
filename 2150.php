<?php

class Solution {

    /**
     * Runtime: 452 ms, faster than 100.00% of PHP online submissions for Find All Lonely Numbers in the Array.
    Memory Usage: 41.2 MB, less than 20.00% of PHP online submissions for Find All Lonely Numbers in the Array.
     *
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findLonely($nums) {
        $counts = [];
        foreach ($nums as $num) {
            if (!array_key_exists($num, $counts)) {
                $counts[$num] = 1;
            } else {
                $counts[$num]++;
            }
        }

        $output = [];
        foreach ($counts as $num => $count) {
            if (
                $count === 1 &&
                !array_key_exists($num + 1, $counts) &&
                !array_key_exists($num - 1, $counts)
            ) {
                $output[] = $num;
            }
        }

        return $output;
    }
}
