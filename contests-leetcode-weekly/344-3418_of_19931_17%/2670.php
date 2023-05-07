<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function distinctDifferenceArray($nums) {
        $distinctCount = 0;
        $counts = [];
        foreach ($nums as $num) {
            if (isset($counts[$num])) {
                $counts[$num]++;
            } else {
                $counts[$num] = 1;
                $distinctCount++;
            }
        }

        $popDistinctCount = 0;
        $popCounts = [];

        $result = [];
        $length = count($nums);
        for ($i = 0; $i < $length; $i++) {
            $num = $nums[$i];
            $counts[$num]--;
            if ($counts[$num] == 0) {
                $distinctCount--;
                unset($counts[$num]);
            }

            if (isset($popCounts[$num])) {
                $popCounts[$num]++;
            } else {
                $popCounts[$num] = 1;
                $popDistinctCount++;
            }

            $result[] = $popDistinctCount - $distinctCount;
        }

        return $result;
    }
}