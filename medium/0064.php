<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $this->grid = $grid;
        $this->row = count($grid);
        $this->col = count($grid[0]);
        $this->score = [];
        $this->score['0-0'] = $grid[0][0];
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                if ($i == 0 && $j == 0) {
                    continue;
                }

                $val = $grid[$i][$j];
                $prev = [];
                if (array_key_exists($i - 1 . '-' . $j, $this->score)) {
                    $prev[] = $this->score[$i - 1 . '-' . $j];
                }

                if (array_key_exists($i . '-' . ($j - 1), $this->score)) {
                    $prev[] = $this->score[$i . '-' . ($j - 1)];
                }

                $this->score[$i . '-' . $j] = min($prev) + $val;
            }
        }

        return $this->score[$this->row - 1 . '-' . $this->col - 1];
    }
}