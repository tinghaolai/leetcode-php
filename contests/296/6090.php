<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMaxGame($nums) {
        while (count($nums) > 1) {
            $newResult = [];
            for ($i = 0; $i < count($nums) / 2; $i++) {
                $operation = ($i % 2 === 0) ? 'min' : 'max';
                $newResult[] = $operation($nums[$i * 2], $nums[$i * 2 + 1]);
            }

            $nums = $newResult;
        }

        return $nums[0];
    }

    function test()
    {
        dd(
//            $this->minMaxGame([1,3,5,2,4,8,2,2]),
            $this->minMaxGame([3])
        );
    }
}