<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function numEnclaves($grid) {
        $this->grid = $grid;
        $result = 0;
        $this->rowCount = count($grid);
        $this->colCount = count($grid[0]);
        $this->haveRun = [];
        foreach ($grid as $i => $row) {
            foreach ($row as $j => $val) {
                if ($val === 1) {
                    if (!empty($this->haveRun[$i . '-' . $j])) {
                        continue;
                    }

                    $this->reach = false;
                    $this->oneCount = 0;
                    $this->runGrid($i, $j);
                    if (!$this->reach) {
                        $result += $this->oneCount;
                    }
                }
            }
        }

        return $result;
    }

    function runGrid($i, $j)
    {
        if (
            $i < 0 ||
            $j < 0 ||
            $i >= $this->rowCount ||
            $j >= $this->colCount
        ) {
            $this->reach = true;
            return;
        }

        $key = $i . '-' . $j;
        if (!empty($this->haveRun[$key])) {
            return;
        }

        $this->haveRun[$key] = true;
        if ($this->grid[$i][$j] === 0) {
            return;
        }

        $this->oneCount++;
        $this->runGrid($i - 1, $j);
        $this->runGrid($i + 1, $j);
        $this->runGrid($i, $j - 1);
        $this->runGrid($i, $j + 1);
    }
}