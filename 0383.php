<?php

class Solution {

    /**
     * Runtime: 26 ms, faster than 75.00% of PHP online submissions for Ransom Note.
    Memory Usage: 19.1 MB, less than 71.43% of PHP online submissions for Ransom Note.
     *
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $counts = [];
        for ($i = 0; $i < strlen($ransomNote); $i++) {
            if (!isset($counts[$ransomNote[$i]])) {
                $counts[$ransomNote[$i]] = 1;
            } else {
                $counts[$ransomNote[$i]]++;
            }
        }

        for ($i = 0; $i < strlen($magazine); $i++) {
            if (isset($counts[$magazine[$i]])) {
                $counts[$magazine[$i]]--;
                if ($counts[$magazine[$i]] === 0) {
                    unset($counts[$magazine[$i]]);
                }
            }
        }

        return count($counts) !== 0;
    }
}
