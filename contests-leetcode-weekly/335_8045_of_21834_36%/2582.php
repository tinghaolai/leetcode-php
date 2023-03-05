<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $time
     * @return Integer
     */
    function passThePillow($n, $time) {
        $current = 1;
        $base = 1;
        while ($time) {
            $current += $base;
            if ($current === $n || $current === 1) {
                $base *= -1;
            }
            $time--;
        }

        return $current;
    }
}