<?php

class Solution {

    /**
     * Runtime: 8 ms, faster than 100.00% of PHP online submissions for Relative Sort Array.
    Memory Usage: 19.5 MB, less than 33.33% of PHP online submissions for Relative Sort Array.
     *
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        $counts = array_count_values($arr1);
        $output = [];
        foreach ($arr2 as $value) {
            if (isset($counts[$value])) {
                for ($i = 1; $i <= $counts[$value]; $i++) {
                    $output[] = $value;
                }

                unset($counts[$value]);
            }
        }

        $notFound = array_keys($counts);
        sort($notFound);

        foreach ($notFound as $value) {
            if (isset($counts[$value])) {
                for ($i = 1; $i <= $counts[$value]; $i++) {
                    $output[] = $value;
                }
            }
        }

        return $output;
    }
}
