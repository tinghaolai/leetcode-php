<?php

class Solution {

    /**
     * Runtime: 47 ms, faster than 100.00% of PHP online submissions for Two Out of Three.
    Memory Usage: 15.8 MB, less than 100.00% of PHP online submissions for Two Out of Three.
     *
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer[] $nums3
     * @return Integer[]
     */
    function twoOutOfThree($nums1, $nums2, $nums3) {
        $output = [];
        $count = [];
        foreach ([$nums1, $nums2, $nums3] as $nums) {
            foreach (array_unique($nums) as $num) {
                if (!array_key_exists($num, $count)) {
                    $count[$num] = true;
                } else if ($count[$num] === true) {
                    $count[$num] = false;
                    $output[] = $num;
                }
            }
        }

        return $output;
    }
}
