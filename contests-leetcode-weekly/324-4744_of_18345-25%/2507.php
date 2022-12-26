<?php

class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function similarPairs($words) {
        $sum = 0;
        $words = array_map(function ($word) {
            $result = [];
            for ($i = 0; $i < strlen($word); $i++) {
                $result[$word[$i]] = true;
            }

            return $result;
        }, $words);

        foreach ($words as $index => $word) {
            for ($i = $index + 1; $i < count($words); $i++) {
                if ($word == $words[$i]) {
                    $sum ++;
                }
            }
        }

        return $sum;
    }

    function test() {
        dd($this->similarPairs(["aba","aabb","abcd","bac","aabc"]));
    }
}