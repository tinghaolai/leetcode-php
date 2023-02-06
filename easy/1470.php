<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function shuffle($nums, $n) {
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $result[] = $nums[$i];
            $result[] = $nums[$i + $n];
        }

        return $result;
    }
}