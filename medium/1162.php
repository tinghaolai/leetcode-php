<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxDistance_solution_1_BFS($grid)
    {
        $max = -1;
        $runs = [];
        $directions = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1],
        ];

        foreach ($grid as $i => $row) {
            foreach ($row as $j => $val) {
                if ($val) {
                    foreach ($directions as $direction) {
                        $newI = $i + $direction[0];
                        $newJ = $j + $direction[1];
                        if (
                            isset($grid[$newI][$newJ]) &&
                            $grid[$newI][$newJ] === 0
                        ) {
                            $grid[$newI][$newJ] = 2;
                            $max = 0;
                            $runs[] = [$newI, $newJ];
                        }
                    }
                }
            }
        }

        while (!empty($runs)) {
            $max++;
            $nextRuns = [];
            foreach ($runs as $position) {
                $i = $position[0];
                $j = $position[1];
                foreach ($directions as $direction) {
                    $newI = $i + $direction[0];
                    $newJ = $j + $direction[1];
                    if (
                        isset($grid[$newI][$newJ]) &&
                        $grid[$newI][$newJ] === 0
                    ) {
                        $grid[$newI][$newJ] = $grid[$i][$j] + 1;
                        $nextRuns[] = [$newI, $newJ];
                    }
                }
            }

            $runs = $nextRuns;
        }

        return $max;


        function maxDistance_solution_2_DP($grid)
        {
            foreach ($grid as $i => $row) {
                foreach ($row as $j => $val) {
                    if ($grid[$i][$j] === 1) {
                        $grid[$i][$j] = 0;
                    } else {
                        $compares = [];
                        foreach ([[-1, 0], [0, -1]] as $pos) {
                            $prevI = $i + $pos[0];
                            $prevJ = $j + $pos[1];
                            if (
                                isset($grid[$prevI][$prevJ]) &&
                                $grid[$prevI][$prevJ] !== -1
                            ) {
                                $compares[] = $grid[$prevI][$prevJ];
                            }
                        }

                        if (!empty($compares)) {
                            $grid[$i][$j] = min($compares) + 1;
                        } else {
                            $grid[$i][$j] = -1;
                        }
                    }
                }
            }

            $result = -1;
            $rowCount = count($grid);
            $colCount = count($grid[0]);
            for ($i = $rowCount - 1; $i >= 0; $i--) {
                for ($j = $colCount - 1; $j >= 0; $j--) {
                    if ($grid[$i][$j] === 0) {
                        continue;
                    }

                    $compares = [];
                    if ($grid[$i][$j] !== -1) {
                        $compares[] = $grid[$i][$j];
                    }

                    foreach ([[1, 0], [0, 1]] as $pos) {
                        $prevI = $i + $pos[0];
                        $prevJ = $j + $pos[1];
                        if (
                            isset($grid[$prevI][$prevJ]) &&
                            $grid[$prevI][$prevJ] !== -1
                        ) {
                            $compares[] = $grid[$prevI][$prevJ] + 1;
                        }
                    }

                    if (!empty($compares)) {
                        $newVal = min($compares);
                        $grid[$i][$j] = $newVal;
                        if ($newVal === -1 || $newVal > $result) {
                            $result = $newVal;
                        }
                    }
                }
            }

            return $result;
        }
    }
}