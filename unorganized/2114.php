<?php

class Solution {

    /**
     * Runtime: 4 ms, faster than 100.00% of PHP online submissions for Maximum Number of Words Found in Sentences.
    Memory Usage: 15.7 MB, less than 56.25% of PHP online submissions for Maximum Number of Words Found in Sentences.
     *
     * @param String[] $sentences
     * @return Integer
     */
    function mostWordsFound($sentences) {
        return max(array_map(function ($sentence) {
            return count(explode(' ', $sentence));
        }, $sentences));
    }
}
