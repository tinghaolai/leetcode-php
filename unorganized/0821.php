<?php

class Solution {

    /**
     * Runtime: 8 ms, faster than 100.00% of PHP online submissions for Shortest Distance to a Character.
    Memory Usage: 15.7 MB, less than 100.00% of PHP online submissions for Shortest Distance to a Character.
     *
     * @param String $s
     * @param String $c
     * @return Integer[]
     */
    function shortestToChar($s, $c) {
        $next = strpos($s, $c);
        $prev = strlen($s);
        $output = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $output[] = min($next, $prev);
            $prev ++;
            if ($next !== strlen($s)) {
                $next --;
            }

            if ($next < 0) {
                $prev = 1;
                $next = strpos($s, $c, $i + 1) - $i - 1;
                $next = ($next < 0) ? strlen($s) : $next;
            }
        }

        return $output;
    }
}
