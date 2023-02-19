<?php

class Solution {

    /**
     * @param Integer[][] $nums1
     * @param Integer[][] $nums2
     * @return Integer[][]
     */
    function mergeArrays($nums1, $nums2) {
        $i = 0;
        $j = 0;
        $result = [];
        $n1Count = count($nums1);
        $n2Count = count($nums2);
        while ($i < $n1Count || $j < $n2Count) {
            if (!array_key_exists($i, $nums1)) {
                $result[] = $nums2[$j];
                $j++;

                continue;
            }

            if (!array_key_exists($j, $nums2)) {
                $result[] = $nums1[$i];
                $i++;
                continue;
            }

            if ($nums1[$i][0] === $nums2[$j][0]) {
                $result[] = [$nums1[$i][0], $nums1[$i][1] + $nums2[$j][1]];
                $i++;
                $j++;
                continue;
            }

            if ($nums1[$i][0] < $nums2[$j][0]) {
                $result[] = $nums1[$i];
                $i++;
                continue;
            }

            $result[] = $nums2[$j];
            $j++;
        }

        return $result;
    }
}