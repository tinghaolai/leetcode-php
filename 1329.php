<?php

class Solution {

    /**
     * Runtime: 40 ms, faster than 50.00% of PHP online submissions for Sort the Matrix Diagonally.
    Memory Usage: 18.4 MB, less than 50.00% of PHP online submissions for Sort the Matrix Diagonally.
     *
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function diagonalSort($mat) {
        $diagonals = [];
        for ($i = 0; $i < count($mat); $i++) {
            for ($j = 0; $j < count($mat[0]); $j++) {
                $name = $this->diagonalName($i, $j);
                if (!isset($diagonals[$name])) {
                    $diagonals[$name] = [];
                }

                $diagonals[$name][] = $mat[$i][$j];
            }
        }

        $sorted = [];
        foreach ($diagonals as $name => $diagonal) {
            rsort($diagonal);
            $sorted[$name] = $diagonal;
        }

        for ($i = 0; $i < count($mat); $i++) {
            for ($j = 0; $j < count($mat[0]); $j++) {
                $name = $this->diagonalName($i, $j);
                $mat[$i][$j] = array_pop($sorted[$name]);
            }
        }

        return $mat;
    }

    function diagonalName($i, $j) {
        $min = min($i, $j);

        return $i - $min . '-' . $j - $min;
    }
}
