<?php

class Solution {

    /**
     * Runtime: 23 ms, faster than 40.00% of PHP online submissions for Find Common Characters.
    Memory Usage: 15.7 MB, less than 60.00% of PHP online submissions for Find Common Characters.
     *
     * @param String[] $words
     * @return String[]
     */
    function commonChars($words) {
        $output = str_split(array_pop($words));
        foreach ($words as $word) {
            foreach ($output as $index => $string) {
                $pos = strpos($word, $string);
                if ($pos === false) {
                    unset($output[$index]);
                } else {
                    $word = substr_replace($word, '', $pos, 1);
                }
            }
        }

        return $output;
    }
}
