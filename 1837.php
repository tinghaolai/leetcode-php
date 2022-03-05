<?php

class Solution {

    /**
     * Runtime: 17 ms, faster than 100.00% of PHP online submissions for Sum of Digits in Base K.
    Memory Usage: 19.1 MB, less than 100.00% of PHP online submissions for Sum of Digits in Base K.
     *
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function sumBase($n, $k) {
        $output = 0;
        while ($n >= $k) {
            $output += $n % $k;
            $n = intdiv($n, $k);
        }

        $output += $n;
        return $output;
    }
}
