<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function leftRigthDifference($nums) {
                $arrayLeft = [];
        $arrayRight = [];
        $left = 0;
        $right = 0;
        $length = count($nums);
        foreach ($nums as $i => $num) {
            $arrayLeft[] = $left;
            array_unshift($arrayRight, $right);
            $left += $num;
            $right += $nums[$length - $i - 1];
        }

        $result = [];
        foreach ($arrayLeft as $i => $left) {
            $right = $arrayRight[$i];
            $result[] = abs($right - $left);
        }

        return $result;
    }
}