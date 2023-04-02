<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function findMatrix($nums) {
        $counts = array_count_values($nums);
        $result = [];
        while (!empty($counts)) {
            $current = [];
            foreach ($counts as $num => $count) {
                $current[] = $num;
                $count--;
                if ($count === 0) {
                    unset($counts[$num]);
                } else {
                    $counts[$num] = $count;
                }
            }

            $result[] = $current;
        }

        return $result;
    }
}