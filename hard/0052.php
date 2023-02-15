<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) {
        $this->n = $n;
        $this->count = 0;
        $this->haveSet = [];
        $this->runRow(0);

        return $this->count;
    }

        public function runRow($row)
    {
        for ($col = 0; $col < $this->n; $col++) {
            if ($this->isValid($row, $col)) {
                $this->haveSet[$row] = $col;
                if ($row === $this->n - 1) {
                    $this->count++;
                } else {
                    $this->runRow($row + 1);
                }

                unset($this->haveSet[$row]);
            }
        }
    }

    public function isValid($row, $col)
    {
        foreach ($this->haveSet as $existsRow => $existsCol) {
            if (
                $existsCol === $col ||
                $this->convertVerticalLeft($row, $col) === $this->convertVerticalLeft($existsRow, $existsCol) ||
                $this->convertVerticalRight($row, $col) === $this->convertVerticalRight($existsRow, $existsCol)
            ) {
                return false;
            }
        }

        return true;
    }

    public function convertVerticalLeft($row, $col)
    {
        $min = min($row, $col);
        $row -= $min;
        $col -= $min;
        return $row . '-' . $col;
    }

    public function convertVerticalRight($row, $col)
    {
        $rowBias = $this->n - 1 - $row;
        $min = min($rowBias, $col);
        $row += $min;
        $col -= $min;
        return $row . '-' . $col;
    }
}