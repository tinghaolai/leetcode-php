<?php

class Solution {

    /**
     * Runtime: 209 ms, faster than 16.67% of PHP online submissions for Maximum Sum Circular Subarray.
    Memory Usage: 19.9 MB, less than 83.33% of PHP online submissions for Maximum Sum Circular Subarray.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubarraySumCircular($nums) {
        $nonCirculate = $nums;
        for ($i = 1; $i < count($nonCirculate); $i++) {
            if ($nonCirculate[$i -1] > 0) {
                $nonCirculate[$i] += $nonCirculate[$i -1];
            }
        }

        $nonCirculateMax = max($nonCirculate);
        $sums = array_sum($nums);
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i -1] < 0) {
                $nums[$i] += $nums[$i -1];
            }
        }

        $circulateMax = $sums - min($nums);
        return ($circulateMax === 0) ? $nonCirculateMax : max($circulateMax, $nonCirculateMax);
    }

    function maxSubarraySumCircular_Time_Limit_Exceeded($nums) {
        $max = max($nums);
        $count = count($nums);
        foreach ($nums as $index => $num) {
            $currentSum = $num;
            for ($i = $index + 1; $i < $index + $count; $i++) {
                $currentSum += $nums[$i % $count];
                if ($currentSum > $max) {
                    $max = $currentSum;
                }
            }
        }

        return $max;
    }
}
