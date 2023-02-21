<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $last = $nums[0];
        $lastCount = 1;
        for ($i = 1; $i < count($nums); $i++) {
            if ($last !== $nums[$i]) {
                if ($lastCount === 1) {
                    return $nums[$i - 1];
                }

                $lastCount = 0;
            }

            $lastCount++;
            $last = $nums[$i];
        }

        return $last;
    }
}