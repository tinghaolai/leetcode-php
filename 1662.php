<?php

class Solution {

    /**
     * Runtime: 16 ms, faster than 9.09% of PHP online submissions for Check If Two String Arrays are Equivalent.
    Memory Usage: 15.6 MB, less than 27.27% of PHP online submissions for Check If Two String Arrays are Equivalent.
     *
     * @param String[] $word1
     * @param String[] $word2
     * @return Boolean
     */
    function arrayStringsAreEqual($word1, $word2) {
        return implode('', $word1) === implode('', $word2);
    }
}
