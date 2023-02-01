<?php

class Solution {

    /**
     * @param String $boxes
     * @return Integer[]
     */
    function minOperations($boxes) {
        $boxes = str_split($boxes);
        $result = array_map(function ($box) {
            return 0;
        }, $boxes);

        $count = 0;
        $accumulation = 0;
        foreach ($boxes as $index => $box) {
            $result[$index] += $accumulation;
            $count += (int) $box;
            $accumulation += $count;
        }

        $count = 0;
        $accumulation = 0;
        for ($i = count($boxes) - 1; $i >= 0; $i--) {
            $result[$i] += $accumulation;
            $count += (int) $boxes[$i];
            $accumulation += $count;
        }

        return $result;
    }
}