<?php

/**
 * Runtime: 7 ms, faster than 100.00% of PHP online submissions for Reverse String II.
Memory Usage: 15.8 MB, less than 71.43% of PHP online submissions for Reverse String II.
 *
 * Class Solution
 */
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function reverseStr($s, $k) {
        $stringSplit = str_split($s, $k);
        $answer = '';
        foreach ($stringSplit as $index => $string) {
            $answer .= ($index % 2) ? $string : strrev($string);
        }

        return $answer;
    }
}
