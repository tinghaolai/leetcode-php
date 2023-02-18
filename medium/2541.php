<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums1, $nums2, $k) {
        $baseOps = [
            1 => 0,
            -1 => 0,
        ];

        foreach ($nums1 as $i => $num1) {
            $num2 = $nums2[$i];
            if ($num1 === $num2) {
                continue;
            }

            if (!$k) { return -1; }
            $count = abs($num2 - $num1) / $k;
            if (!is_int($count)) {
                return -1;
            }

            $base = $num2 - $num1 > 0 ? 1 : -1;
            $baseOps[$base] += $count;
        }

        if ($baseOps[-1] !== $baseOps[1]) {
            return -1;
        }

        return $baseOps[-1];
    }
}