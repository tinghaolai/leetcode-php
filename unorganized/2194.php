<?php

class Solution {

    /**
     * Runtime: 24 ms, faster than 16.67% of PHP online submissions for Cells in a Range on an Excel Sheet.
    Memory Usage: 19.5 MB, less than 33.33% of PHP online submissions for Cells in a Range on an Excel Sheet.
     *
     * @param String $s
     * @return String[]
     */
    function cellsInRange($s) {
        $explode  = explode(':', $s);
        $rowStart = $explode[0][1];
        $rowEnd   = $explode[1][1];
        $colStart = ord($explode[0][0]);
        $colEnd   = ord($explode[1][0]);
        $output   = [];
        for ($j = $colStart; $j <= $colEnd; $j++) {
            for ($i = $rowStart; $i <= $rowEnd; $i++) {
                $output[] = phpchr($j) . $i;
            }
        }
        return $output;
    }
}
