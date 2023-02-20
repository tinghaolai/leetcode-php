<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $l1 = count($nums1);
        $l2 = count($nums2);
        $length = $l1 + $l2;
        $mid = (int)ceil($length / 2);
        $count = 0;
        $i = 0;
        $j = 0;
        if ($mid != 1) {
            while ($count !== $mid - 1) {
                $count++;
                if ($i === $l1) {
                    $j++;
                    continue;
                }

                if ($j === $l2) {
                    $i++;
                    continue;
                }

                if ($nums1[$i] < $nums2[$j]) {
                    $i++;
                } else {
                    $j++;
                }
            }
        }

        if ($i === $l1) {
            $result = $nums2[$j];
            $j++;
        } elseif ($j === $l2) {
            $result = $nums1[$i];
            $i++;
        } elseif ($nums1[$i] < $nums2[$j]) {
            $result = $nums1[$i];
            $i++;
        } else {
            $result = $nums2[$j];
            $j++;
        }

        if ($length % 2 === 1) {
            return $result;
        }

        if ($i === $l1) {
            $result += $nums2[$j];
        } elseif ($j === $l2) {
            $result += $nums1[$i];
        } elseif ($nums1[$i] < $nums2[$j]) {
            $result += $nums1[$i];
        } else {
            $result += $nums2[$j];
        }

        return $result / 2;
    }
}