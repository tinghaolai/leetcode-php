<?php

class Solution {

    /**
     * Runtime: 14 ms, faster than 6.25% of PHP online submissions for Baseball Game.
    Memory Usage: 15.9 MB, less than 56.25% of PHP online submissions for Baseball Game.
     *
     * @param String[] $ops
     * @return Integer
     */
    function calPoints($ops) {
        $output = [];
        foreach ($ops as $operation) {
            switch ($operation) {
                case '+':
                    $output[] = $output[count($output) - 1] + $output[count($output) - 2];
                    break;
                case 'D':
                    $output[] = $output[count($output) - 1] * 2;
                    break;
                case 'C':
                    array_pop($output);
                    break;

                default:
                    $output[] = $operation;
            }
        }

        return array_sum($output);
    }
}
