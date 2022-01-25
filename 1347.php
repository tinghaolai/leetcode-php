<?php

class Solution {

    /**
     * Runtime: 96 ms, faster than 100.00% of PHP online submissions for Minimum Number of Steps to Make Two Strings Anagram.
    Memory Usage: 16.1 MB, less than 100.00% of PHP online submissions for Minimum Number of Steps to Make Two Strings Anagram.
     *
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function minSteps($s, $t) {
        $charCount = [];
        for ($i = 0; $i < strlen($s); $i ++) {
            if (!isset($charCount[$s[$i]])) {
                $charCount[$s[$i]] = 1;
            } else {
                $charCount[$s[$i]]++;
            }
        }

        for ($i = 0; $i < strlen($t); $i ++) {
            if (isset($charCount[$t[$i]])) {
                $charCount[$t[$i]] --;
                if ($charCount[$t[$i]] === 0) {
                    unset($charCount[$t[$i]]);
                }
            }
        }

        return array_sum($charCount);
    }
}
