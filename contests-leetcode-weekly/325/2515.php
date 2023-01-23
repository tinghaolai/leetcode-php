<?php

class Solution {

    /**
     * @param String[] $words
     * @param String $target
     * @param Integer $startIndex
     * @return Integer
     */
    function closetTarget($words, $target, $startIndex) {
        $result = -1;
        $wordsLength = count($words);
        foreach ($words as $index => $word) {
            if ($word === $target) {
                $distance = abs($startIndex - $index);
                $distance = min($distance, $wordsLength - $distance);
                if ($result === -1) {
                    $result = $distance;
                } else {
                    $result = min($result, $distance);
                }
            }
        }

        return $result;
    }
}