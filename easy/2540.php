<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
function getCommon($nums1, $nums2) {
        $nums1Exists = [];
        foreach ($nums1 as $num) {
            $nums1Exists[$num] = true;
        }

        foreach ($nums2 as $num) {
            if (!empty($nums1Exists[$num])) {
                return $num;
            }
        }

        return -1;
    }
}