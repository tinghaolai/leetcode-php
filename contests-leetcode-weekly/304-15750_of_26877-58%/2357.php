<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumOperations($nums) {
        $counts = [];
        $min = 0;
        $max = $nums[0];
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i]) {
                $counts[$nums[$i]] = $nums[$i];
                if ($nums[$i] < $min) {
                    $min = $nums[$i];
                }

                if ($nums[$i] > $max) {
                    $max = $nums[$i];
                }
            }
        }

        return count($counts);
    }

    function test()
    {
        dd(
            $this->minimumOperations([1,5,0,3,5]),
            $this->minimumOperations([1,1,1,2,2,2,3,3])
        );
    }
}