<?php
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function findColumnWidth($grid) {
        $result = [];
        foreach ($grid as $val) {
            foreach ($val as $i => $item) {
                $width = strlen((string) abs($item));
                if ($item < 0) {
                    $width++;
                }

                if (!isset($result[$i]) || $result[$i] < $width) {
                    $result[$i] = $width;
                }
            }
        }

        return $result;
    }
}