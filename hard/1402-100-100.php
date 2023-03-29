<?php

class Solution {

    /**
     * @param Integer[] $satisfaction
     * @return Integer
     */
    function maxSatisfaction($satisfaction) {
        rsort($satisfaction);
        $result = 0;
        $acc = 0;
        foreach ($satisfaction as $score) {
            $acc += $score;
            if ($acc <= 0) {
                break;
            }

            $result += $acc;
        }

        return $result;
    }
}