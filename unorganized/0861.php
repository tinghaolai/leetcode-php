<?php

class Solution {

    /**
     * Runtime: 8 ms, faster than 100.00% of PHP online submissions for Score After Flipping Matrix.
    Memory Usage: 15.6 MB, less than 100.00% of PHP online submissions for Score After Flipping Matrix.
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    function matrixScore($grid) {
        $grid = array_map(function ($set) {
            return ($set[0]) ? $set : array_map(function ($num) {
                return ($num) ? 0 : 1;
            }, $set);
        }, $grid);

        $rowCount = count($grid);
        $colCount = count($grid[0]);
        for ($j = 0; $j < $colCount; $j++) {
            $oneCount = 0;
            for ($i = 0; $i < $rowCount; $i++) {
                if ($grid[$i][$j]) {
                    $oneCount++;
                }
            }

            if ($oneCount < $rowCount / 2) {
                for ($i = 0; $i < $rowCount; $i++) {
                    $grid[$i][$j] = ($grid[$i][$j]) ? 0 : 1;
                }
            }
        }

        $total = 0;
        for ($i = 0; $i < $rowCount; $i++) {
            $currentNum = 1;
            for ($j = $colCount - 1; $j >= 0; $j--) {
                if ($grid[$i][$j]) {
                    $total += $currentNum;
                }

                $currentNum *= 2;
            }
        }

        return $total;
    }
}
