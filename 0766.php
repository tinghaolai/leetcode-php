<?php

class Solution {

    /**
     * Runtime: 28 ms, faster than 100.00% of PHP online submissions for Toeplitz Matrix.
    Memory Usage: 19.4 MB, less than 27.27% of PHP online submissions for Toeplitz Matrix.
     *
     * @param Integer[][] $matrix
     * @return Boolean
     */
    function isToeplitzMatrix($matrix) {
        foreach ($matrix as $i => $row) {
            foreach ($row as $j => $item) {
                if (isset($matrix[$i - 1][$j - 1]) && $matrix[$i - 1][$j - 1] !== $item) {
                    return false;
                }
            }
        }

        return true;
    }
}
