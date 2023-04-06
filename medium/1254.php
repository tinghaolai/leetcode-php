<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function closedIsland($grid)
    {
        $this->grid = $grid;
        $this->haveRun = [];
        $result = 0;
        $this->rowCount = count($grid);
        $this->colCount = count($grid[0]);
        foreach ($grid as $row => $rowVal) {
            foreach ($rowVal as $col => $colVal) {
                if ($colVal === 1) {
                    continue;
                }

                $key = $row . '-' . $col;
                if (!empty($this->haveRun[$key])) {
                    continue;
                }

                $this->valid = true;
                $this->runIsland($row, $col);
                if ($this->valid) {
                    $result++;
                }
            }
        }

        return $result;
    }

    public function runIsland($i, $j)
    {
        if ($i < 0 || $i >= $this->rowCount || $j < 0 || $j >= $this->colCount) {
            $this->valid = false;
            return;
        }

        $key = $i . '-' . $j;
        if (!empty($this->haveRun[$key])) {
            return;
        }

        $this->haveRun[$key] = true;
        if ($this->grid[$i][$j] === 1) {
            return;
        }

        $this->runIsland($i - 1, $j);
        $this->runIsland($i + 1, $j);
        $this->runIsland($i, $j - 1);
        $this->runIsland($i, $j + 1);
    }
}