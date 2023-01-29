<?php

class Solution {

    /**
     * Runtime: 30 ms, faster than 40.00% of PHP online submissions for Permutation in String.
    Memory Usage: 15.7 MB, less than 68.00% of PHP online submissions for Permutation in String.
     *
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2) {
        $s1Count = [];
        for ($i = 0; $i < strlen($s1); $i++) {
            if (!isset($s1Count[$s1[$i]])) {
                $s1Count[$s1[$i]] = 1;
            } else {
                $s1Count[$s1[$i]]++;
            }
        }

        $s2Count = [];
        for ($i = 0; $i < strlen($s1); $i++) {
            if (!isset($s2Count[$s2[$i]])) {
                $s2Count[$s2[$i]] = 1;
            } else {
                $s2Count[$s2[$i]]++;
            }
        }

        while ($i <= strlen($s2)) {
            if ($s2Count == $s1Count) {
                return true;
            }

            if (!isset($s2Count[$s2[$i]])) {
                $s2Count[$s2[$i]] = 1;
            } else {
                $s2Count[$s2[$i]]++;
            }

            $s2Count[$s2[$i - strlen($s1)]]--;
            if (!$s2Count[$s2[$i - strlen($s1)]]) {
                unset($s2Count[$s2[$i - strlen($s1)]]);
            }

            $i++;
        }

        return false;
    }
}
