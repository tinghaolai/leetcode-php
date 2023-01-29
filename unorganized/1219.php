<?php

class Solution {

    /**
     * Runtime: 529 ms, faster than 50.00% of PHP online submissions for Path with Maximum Gold.
    Memory Usage: 15.7 MB, less than 50.00% of PHP online submissions for Path with Maximum Gold.
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    function getMaximumGold($grid) {
        $max = 0;
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                $currentMax = $this->walkThrough($grid, $i, $j, 0);
                if($currentMax > $max) {
                    $max = $currentMax;
                }
            }
        }

        return $max;
    }

    function walkThrough($grid, $i, $j, $amount) {
        if (!isset($grid[$i][$j]) || $grid[$i][$j] === 0) {
            return $amount;
        }

        $amount += $grid[$i][$j];
        $stepMax = 0;
        $grid[$i][$j] = 0;
        foreach ([
            [0, 1],
            [0, -1],
            [1, 0],
            [-1, 0],
         ] as $step) {
            $currentStepMax = $this->walkThrough($grid, $i + $step[0], $j + $step[1], 0);
            if ($currentStepMax > $stepMax) {
                $stepMax = $currentStepMax;
            }
        }

        return $amount + $stepMax;
    }
}
