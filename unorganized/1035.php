<?php

class Solution {

    /**
     * Runtime: 95 ms, faster than 100.00% of PHP online submissions for Uncrossed Lines.
    Memory Usage: 21.7 MB, less than 100.00% of PHP online submissions for Uncrossed Lines.
     *
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function maxUncrossedLines($nums1, $nums2) {
        $count = [];
        foreach ($nums1 as $index1 => $num1) {
            foreach ($nums2 as $index2 => $num2) {
                if ($num1 === $num2) {
                    $prev = (isset($count[$index1 - 1][$index2 -1])) ? $count[$index1 - 1][$index2 -1] : 0;
                    $count[$index1][$index2] = $prev + 1;
                } else {
                    $up = (isset($count[$index1 - 1][$index2])) ? $count[$index1 - 1][$index2] : 0;
                    $left = (isset($count[$index1][$index2 -1])) ? $count[$index1][$index2 -1] : 0;
                    $count[$index1][$index2] = max($up, $left);
                }
            }
        }

        return $count[count($nums1) - 1][count($nums2) - 1];
    }
}
