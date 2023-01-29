<?php

class Solution {

    /**
     * Runtime: 221 ms, faster than 12.07% of PHP online submissions for Minimum Absolute Difference.
    Memory Usage: 30.6 MB, less than 55.17% of PHP online submissions for Minimum Absolute Difference.
     *
     * @param Integer[] $arr
     * @return Integer[][]
     */
    function minimumAbsDifference($arr) {
        sort($arr);
        $result = [[$arr[0], $arr[1]]];
        $min = $arr[1] - $arr[0];
        for ($i = 1; $i < count($arr) - 1; $i++) {
            $diff = $arr[$i + 1] - $arr[$i];
            if ($diff < $min) {
                $result = [];
                $min = $diff;
            }

            if ($diff === $min) {
                $result[] = [$arr[$i], $arr[$i + 1]];
            }
        }

        return $result;
    }
}
