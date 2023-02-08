<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums)
    {
        $output = -1;
        $end = count($nums) - 1;
        $currentIndex = -1;
        $availableStep = 1;
        while ($currentIndex < $end) {
            $output++;
            if ($currentIndex + $availableStep >= $end) {
                return $output;
            }

            $currentMaxIndex = $currentIndex + 1;
            $currentMaxJump = $currentMaxIndex + $nums[$currentMaxIndex];
            for ($i = 2; $i <= $availableStep && $i + $currentIndex <= $end; $i++) {
                $index = $i + $currentIndex;
                $jump = $index + $nums[$index];
                if ($jump > $currentMaxJump) {
                    $currentMaxIndex = $index;
                    $currentMaxJump = $jump;
                }
            }

            $currentIndex = $currentMaxIndex;
            $availableStep = $nums[$currentIndex];
        }

        return $output;
    }
}