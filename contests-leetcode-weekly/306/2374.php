<?php

class Solution {

    /**
     * @param Integer[] $edges
     * @return Integer
     */
    function edgeScore($edges) {
        $count = [];
        $maxIndex = 0;
        $max = 0;
        foreach ($edges as $index => $value) {
            if (!isset($count[$value])) {
                $count[$value] = 0;
            }

            $count[$value] += $index;
            if (($count[$value] > $max) || ($count[$value] === $max && $value < $maxIndex)) {
                $max = $count[$value];
                $maxIndex = $value;
            }
        }

        return $maxIndex;
    }
}