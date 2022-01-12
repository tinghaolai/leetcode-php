<?php

class Solution {

    /**
     * Runtime: 328 ms, faster than 33.33% of PHP online submissions for Island Perimeter.
    Memory Usage: 17.9 MB, less than 53.33% of PHP online submissions for Island Perimeter.
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid) {
        $rowCount = count($grid);
        $colCount = count($grid[0]);
        $count = 0;
        for ($i = 0; $i < $rowCount; $i++) {
            for ($j = 0; $j < $colCount; $j++) {
                if ($grid[$i][$j]) {
                    $count += 4;

                    foreach ([
                        [-1, 0],
                        [0, -1],
                        [1, 0],
                        [0, 1],
                     ] as $offSet) {
                        if (
                            isset($grid[$i + $offSet[0]][$j + $offSet[1]]) &&
                            $grid[$i + $offSet[0]][$j + $offSet[1]]
                        ) {
                            $count--;
                        }
                    }
                }
            }
        }

        return $count;
    }
}
