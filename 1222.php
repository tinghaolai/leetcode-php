<?php

class Solution {

    /**
     * Runtime: 17 ms, faster than 100.00% of PHP online submissions for Queens That Can Attack the King.
    Memory Usage: 19.2 MB, less than 100.00% of PHP online submissions for Queens That Can Attack the King.
     *
     * @param Integer[][] $queens
     * @param Integer[] $king
     * @return Integer[][]
     */
    function queensAttacktheKing($queens, $king) {
        foreach ($queens as $queen) {
            $queensPos[$queen[0]][$queen[1]] = true;
        }

        $output = [];
        foreach ([
            [1, 0],
            [-1, 0],
            [0, 1],
            [0, -1],
            [1, 1],
            [-1, -1],
            [1, -1],
            [-1, 1],
        ] as $offset) {
            $i = $king[0] + $offset[0];
            $j = $king[1] + $offset[1];
            while (
                $i >= 0 &&
                $j >= 0 &&
                $i < 8 &&
                $j < 8
            ) {
                if (isset($queensPos[$i][$j]) && $queensPos[$i][$j]) {
                    $output[] = [$i, $j];
                    break;
                }

                $i += $offset[0];
                $j += $offset[1];
            }
        }

        return $output;
    }
}
