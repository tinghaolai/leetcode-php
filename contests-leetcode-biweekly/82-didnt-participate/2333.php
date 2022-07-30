<?php

class Solution {

    /**
     * Runtime: 511 ms
    Memory Usage: 35.2 MB
     *
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k1
     * @param Integer $k2
     * @return Integer
     */
    function minSumSquareDiff($nums1, $nums2, $k1, $k2) {
        $n = count($nums1);
        $diffs = [];
        $max = 0;
        for ($i = 0; $i < $n; $i++) {
            $diff = abs($nums1[$i] - $nums2[$i]);
            if ($diff > $max) {
                $max = $diff;
            }
            if (!isset($diffs[$diff])) {
                $diffs[$diff] = 1;
            } else {
                $diffs[$diff] ++;
            }
        }

        $k = $k1 + $k2;
        for ($i = $max; $i > 0; $i--) {
            if ($k <= $diffs[$i]) {
                $diffs[$i] -= $k;
                $diffs[$i - 1] += $k;
                break;
            } else {
                if (!isset($diffs[$i - 1])) {
                    $diffs[$i - 1] = $diffs[$i];
                } else {
                    $diffs[$i - 1] += $diffs[$i];
                }

                $k -= $diffs[$i];
                unset($diffs[$i]);
            }
        }

        $result = 0;
        foreach ($diffs as $diff => $count) {
            $result += $diff * $diff * $count;
        }

        return $result;
    }

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k1
     * @param Integer $k2
     * @return Integer
     */
    function minSumSquareDiff_timeout($nums1, $nums2, $k1, $k2) {
        $n = count($nums1);
        $diffs = [];
        for ($i = 0; $i < $n; $i++) {
            $diffs[] = abs($nums1[$i] - $nums2[$i]);
        }

        rsort($diffs);
        foreach ([$k1, $k2] as $k) {
            while ($k && $diffs[0]) {
                $k--;
                $diffs[0]--;
                rsort($diffs);
            }
        }

        return array_sum(array_map(function ($diff) { return $diff * $diff; }, $diffs));
    }

    public function test()
    {
        dd(
//          $this->minSumSquareDiff(
//              [1, 2, 3, 4],
//              [2, 10, 20, 19],
//              0,
//              0
//          ),
            $this->minSumSquareDiff(
                [1,4,10, 12],
                [5,8,6,9],
                1,
                1
            )
        );
    }
}