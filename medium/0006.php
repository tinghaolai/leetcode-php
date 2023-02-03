<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        if ($numRows === 1) {
            return $s;
        }

        $output = '';
        $sLength = strlen($s);
        for ($i = 0; $i < $numRows; $i++) {
            $intervals = [];
            $base = 1;
            $current = $i;
            foreach ([-1, 1] as $j) {
                $interval = 0;
                while (true) {
                    if ($current + $base < 0 || $current + $base === $numRows) {
                        $base *= -1;
                    }

                    $current += $base;
                    $interval++;
                    if ($current === $i) {
                        $intervals[$j] = $interval;
                        break;
                    }
                }
            }

            $currentIndex = $i;
            $intervalIndex = -1;
            do {
                $output .= $s[$currentIndex];
                $currentIndex += $intervals[$intervalIndex];
                $intervalIndex *= -1;
            } while ($currentIndex < $sLength);
        }

        return $output;
    }
}