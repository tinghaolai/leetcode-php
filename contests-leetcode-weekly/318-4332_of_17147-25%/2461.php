<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumSubarraySum($nums, $k) {
        $currentSum = 0;
        $currentNumCounts = [];
        $currentDuplicateCount = 0;
        for ($i = 0; $i < $k; $i++) {
            if (!isset($nums[$i])) {
                return 0;
            }

            $num = $nums[$i];
            $currentSum += $num;
            if (!isset($currentNumCounts[$num])) {
                $currentNumCounts[$num] = 1;
            } else {
                if ($currentNumCounts[$num] === 1) {
                    $currentDuplicateCount++;
                }

                $currentNumCounts[$num]++;
            }
        }

        $currentMax = ($currentDuplicateCount === 0) ? $currentSum : 0;
        for ($i = $k; $i < count($nums); $i++) {
            $indexLeft = $i - $k;
            $numLeft = $nums[$indexLeft];
            $num = $nums[$i];
            $currentSum -= $numLeft;
            $currentSum += $num;
            $currentNumCounts[$numLeft]--;
            if ($currentNumCounts[$numLeft] === 1) {
                $currentDuplicateCount--;
            }

            if ($currentNumCounts[$numLeft] === 0) {
                unset($currentNumCounts[$numLeft]);
            }

            if (!isset($currentNumCounts[$num])) {
                $currentNumCounts[$num] = 1;
            } else {
                if ($currentNumCounts[$num] === 1) {
                    $currentDuplicateCount++;
                }

                $currentNumCounts[$num]++;
            }

            if ($currentDuplicateCount === 0 && $currentSum > $currentMax) {
                $currentMax = $currentSum;
            }
        }

        return $currentMax;
    }

    function test()
    {
//        return $this->maximumSubarraySum([1,5,4,2,9,9,9], 3);
        return $this->maximumSubarraySum([1,1,1,1,1,1], 2);
    }
}