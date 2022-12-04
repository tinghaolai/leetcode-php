<?php

class Solution {

    /**
     * @param String $sentence
     * @return Boolean
     */
    function isCircularSentence($sentence) {
        $words = explode(' ', $sentence);
        $result = true;
        for ($i = 1; $i < count($words); $i++) {
            if ($words[$i][0] !== $words[$i - 1][-1]) {
                return false;
            }
        }

        if ($words[0][0] !== $words[count($words) - 1][-1]) {
            return false;
        }

        return $result;
    }

    function test() {
        return $this->isCircularSentence("leetcode");
    }
}