<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function findSubarrays($nums) {
        $exists = [];
        $count = count($nums);
        for ($i = 0; $i < $count - 1; $i++) {
            $sum = $nums[$i] + $nums[$i + 1];
            if (isset($exists[$sum])) {
                return true;
            }

            $exists[$sum] = true;
        }

        return false;
    }

    function test()
    {
        dd(
            $this->findSubarrays([4,2,4]),
            $this->findSubarrays([0,0]),
            $this->findSubarrays([1,2,3,4,5])
        );
    }
}