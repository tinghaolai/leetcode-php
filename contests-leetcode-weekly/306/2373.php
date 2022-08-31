<?php

class Solution {

    /**
     * Runtime: 100 ms
    Memory Usage: 21.7 MB
     *
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function largestLocal($grid) {
        $result = [];
        for ($i = 1; $i < count($grid) - 1; $i++) {
            for ($j = 1; $j < count($grid[0]) - 1; $j++) {
                $result[$i - 1][$j - 1] = max(
                    $grid[$i][$j],
                    $grid[$i - 1][$j - 1],
                    $grid[$i - 1][$j],
                    $grid[$i][$j - 1],
                    $grid[$i + 1][$j + 1],
                    $grid[$i][$j + 1],
                    $grid[$i + 1][$j],
                    $grid[$i + 1][$j - 1],
                    $grid[$i - 1][$j + 1]
                );
            }
        }

        return $result;
    }

    function test()
    {
        dd($this->largestLocal([[9,9,8,1],[5,6,2,6],[8,2,6,4],[6,2,2,2]]));
    }
}