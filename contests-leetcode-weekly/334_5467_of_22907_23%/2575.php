<?php

class Solution {

    /**
     * @param String $word
     * @param Integer $m
     * @return Integer[]
     */
    function divisibilityArray($word, $m) {
                $current = 0;
        $length = strlen($word);
        $result = [];
        for ($i = 0; $i < $length; $i++) {
            $current = $current * 10 + ((int) $word[$i]);
            $current = $current % $m;
            if ($current === 0) {
                $result[] = 1;
            } else {
                $result[] = 0;
            }
        }

        return $result;
    }
}