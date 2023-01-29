<?php

class Solution {

    /**
     * Runtime: 17 ms, faster than 20.00% of PHP online submissions for Split a String in Balanced Strings.
    Memory Usage: 19.3 MB, less than 40.00% of PHP online submissions for Split a String in Balanced Strings.
     *
     * @param String $s
     * @return Integer
     */
    function balancedStringSplit($s) {
        $count = ['L' => 0, 'R' => 0];
        $output = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $count[$s[$i]] += 1;
            if ($count['L'] === $count['R']) {
                $output++;
            }
        }

        return $output;
    }
}
