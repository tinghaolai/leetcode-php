<?php

class Solution {

    protected $width;
    protected $height;
    /**
     * Runtime: 31 ms, faster than 25.00% of PHP online submissions for Unique Paths III.
    Memory Usage: 19.2 MB, less than 75.00% of PHP online submissions for Unique Paths III.
     *
     * run through every possible path solution
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    function uniquePathsIII($grid) {
        $this->height = count($grid);
        $this->width = count($grid[0]);
        $emptyCount = 0;
        foreach ($grid as $i => $row) {
            foreach ($row as $j => $column) {
                if ($grid[$i][$j] === 1) {
                    $startI = $i;
                    $startJ = $j;
                } else if ($grid[$i][$j] === 0) {
                    $emptyCount++;
                }
            }
        }

        return $this->walk($grid, $startI, $startJ, $emptyCount);
    }

    function walk($grid, $startI, $startJ, $emptyCount)
    {
        $successPath = 0;
        $grid[$startI][$startJ] = 3;
        foreach ([
            [0, 1],
            [0, -1],
            [1, 0],
            [-1, 0]
         ] as $offset) {
            $newStartI = $startI + $offset[0];
            $newStartJ = $startJ + $offset[1];
            if (
                $newStartI >= 0 &&
                $newStartI < $this->height &&
                $newStartJ >= 0 &&
                $newStartJ < $this->width
            ) {
                if ($grid[$newStartI][$newStartJ] === 2) {
                    if ($emptyCount === 0) {
                        $successPath ++;
                    }
                } else if ($grid[$newStartI][$newStartJ] === 0) {
                    $successPath += $this->walk($grid, $newStartI, $newStartJ, $emptyCount - 1);
                }
            }
        }

        return $successPath;
    }

    public function test()
    {
//        return $this->uniquePathsIII([[1,0,0,0],[0,0,0,0],[0,0,2,-1]]);
        return $this->uniquePathsIII([[1,0,0,0],[0,0,0,0],[0,0,0,2]]);
    }
}