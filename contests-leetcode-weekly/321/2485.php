<?php

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function pivotInteger($n) {
        $rightSum = $n;
        $right = $n;
        $leftSum = 1;
        $left = 1;
        while ($right !== $left) {
            if ($leftSum < $rightSum) {
                $left++;
                $leftSum += $left;
            } else {
                $right--;
                $rightSum += $right;
            }
        }

        return $rightSum === $leftSum ? $right : -1;
    }
}