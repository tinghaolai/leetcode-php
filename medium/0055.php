<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
                $targetIndex = count($nums) - 1;
        $currentIndex = 0;

        while ($currentIndex < $targetIndex) {
            $currentNextIndex = false;
            $nextMax = 0;
            if ($nums[$currentIndex] === 0) {
                return false;
            }

            for ($i = 1; $i <= $nums[$currentIndex]; $i++) {
                $nextIndex = $currentIndex + $i;
                $max = $nums[$nextIndex] + $i - 1;
                if (
                    $currentNextIndex === false ||
                    $max > $nextMax
                ) {
                    $currentNextIndex = $nextIndex;
                    $nextMax = $max;
                }
            }

            if (!$currentNextIndex) {
                return false;
            }

            $currentIndex = $currentNextIndex;
        }

        return true;
    }
}