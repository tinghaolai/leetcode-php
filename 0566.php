<?php

class Solution {

    /**
     * Runtime: 33 ms, faster than 77.27% of PHP online submissions for Reshape the Matrix.
    Memory Usage: 22 MB, less than 9.09% of PHP online submissions for Reshape the Matrix.
     *
     * @param Integer[][] $mat
     * @param Integer $r
     * @param Integer $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c) {
        $output = [];
        $current = [];
        foreach ($mat as $items) {
            foreach ($items as $item) {
                $current[] = $item;
                if (count($current) === $c) {
                    $output[] = $current;
                    $current = [];
                }
            }
        }

        return count($output) === $r ? $output : $mat;
    }
}
