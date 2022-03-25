<?php

class Solution {

    /**
     * Runtime: 8 ms, faster than 77.27% of PHP online submissions for Sorting the Sentence.
    Memory Usage: 19.2 MB, less than 45.45% of PHP online submissions for Sorting the Sentence.
     *
     * @param String $s
     * @return String
     */
    function sortSentence($s) {
        $stringKey = [];
        foreach (explode(' ', $s) as $string) {
            $stringKey[(int) substr($string, -1, 1)] = substr($string, 0, -1);
        }

        ksort($stringKey);

        return implode(' ', $stringKey);
    }
}
