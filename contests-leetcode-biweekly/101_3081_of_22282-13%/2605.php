<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function minNumber($nums1, $nums2)
    {
        $n1Exiect = [];
        foreach ($nums1 as $num) {
            $n1Exiect[$num] = true;
        }

        sort($nums2);
        foreach ($nums2 as $num) {
            if (!empty($n1Exiect[$num])) {
                return $num;
            }
        }

        $mins = [min($nums1), min($nums2)];
        sort($mins);

        $string = $mins[0] . $mins[1];
        return (int)($string);
    }
}