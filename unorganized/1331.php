<?php

class Solution {

    /**
     * Runtime: 273 ms, faster than 14.29% of PHP online submissions for Rank Transform of an Array.
    Memory Usage: 38.7 MB, less than 28.57% of PHP online submissions for Rank Transform of an Array.
     *
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr) {
        $origin = $arr;
        sort($arr);
        $rankMapping = [];
        $currentRank = 1;
        $rankMapping[$arr[0]] = $currentRank;
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] !== $arr[$i - 1]) {
                $currentRank++;
            }

            $rankMapping[$arr[$i]] = $currentRank;
        }

        $output = [];
        foreach ($origin as $value) {
            $output[] = $rankMapping[$value];
        }

        return $output;
    }
}
