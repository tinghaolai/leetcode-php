<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findPrefixScore($nums) {
        $result = [];
        $max = 0;
        $acc = 0;
        foreach ($nums as $i => $num) {
            $max = max($max, $num);
            $acc += $num + $max;
            $result[$i] = $acc;
        }

        return $result;
    }
}