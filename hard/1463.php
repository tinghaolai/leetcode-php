<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function cherryPickup($grid) {
        $this->grid = $grid;
        $this->moves = [[1, -1], [1, 0], [1, 1]];
        $this->rowCount = count($grid);
        $this->colCount = count($grid[0]);
        $this->maxNextSteps = [];
        $this->max = 0;
        $botA = [0, 0];
        $botB = [0, $this->colCount - 1];
        $this->runGrid(0,0, $botA, $botB);

        return $this->max;
    }

    public function runGrid($sum, $row, ...$bots)
    {
        $jExists = [];
        $rowValSum = 0;
        $maxNextStepName = '';
        foreach ($bots as $bot) {
            $i = $bot[0];
            $j = $bot[1];
            $maxNextStepName .= $i . '-' . $j . '-';
            if(
                $i >= $this->rowCount ||
                $j >= $this->colCount ||
                $i < 0 ||
                $j < 0
            ) {
                return 0;
            }

            if (empty($jExists[$j])) {
                $rowValSum += $this->grid[$i][$j];
                $jExists[$j] = true;
            }
        }

        $sum += $rowValSum;
        if ($row === $this->rowCount - 1) {
            $this->max = max($this->max, $sum);
            return $rowValSum;
        }

        if (array_key_exists($maxNextStepName, $this->maxNextSteps)) {
            $nextStepMax = $this->maxNextSteps[$maxNextStepName];
            $sum += $nextStepMax;
            $this->max = max($this->max, $sum);

            return $nextStepMax + $rowValSum;
        }

        $currentMaxSum = 0;
        foreach ($this->moves as $moveA) {
            $botA = [$bots[0][0] + $moveA[0], $bots[0][1] + $moveA[1]];
            foreach ($this->moves as $moveB) {
                $botB = [$bots[1][0] + $moveB[0], $bots[1][1] + $moveB[1]];
                $result = $this->runGrid(
                    $sum,
                    $row + 1,
                    $botA,
                    $botB
                );

                $currentMaxSum = max($result, $currentMaxSum);
            }
        }

        $this->maxNextSteps[$maxNextStepName] = $currentMaxSum;

        return $rowValSum + $currentMaxSum;
    }
}