<?php

class Solution {

    /**
     * @param Integer[] $skill
     * @return Integer
     */
    function dividePlayers($skill) {
        sort($skill);
        $count = count($skill);

        $v1Index = 0;
        $v2Index = $count - 1;
        $v1 = $skill[$v1Index];
        $v2 = $skill[$v2Index];
        $sum = $v1 * $v2;
        $matchSum = $v1 + $v2;
        $count -= 2;

        while ($count > 0) {
            $v1Index++;
            $v2Index--;
            $count -= 2;
            $v1 = $skill[$v1Index];
            $v2 = $skill[$v2Index];
            if ($v1 + $v2 !== $matchSum) {
                return -1;
            }

            $sum += $v1 * $v2;
        }

        return $sum;
    }
}