<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimizeSum($nums) {
       sort($nums);
        $length = count($nums);
        $numA = array_slice($nums, 0, $length - 2);
        $numB = array_slice($nums, 1, $length - 2);
        $numC = array_slice($nums, 2);

        $result = min(
            $numA[count($numA) - 1] - $numA[0],
            $numB[count($numB) - 1] - $numB[0],
            $numC[count($numC) - 1] - $numC[0]
        );

        return $result;
    }
}