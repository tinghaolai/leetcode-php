<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer[]
     */
    function rowAndMaximumOnes($mat) {
        $max = -1;
        $row = 0;
        foreach ($mat as $i => $rowVal) {
            $currentCount = 0;
            foreach ($rowVal as $val) {
                if ($val) {
                    $currentCount++;
                }
            }

            if ($currentCount > $max) {
                $max = $currentCount;
                $row = $i;
            }
        }

        return [$row, $max];
    }
}