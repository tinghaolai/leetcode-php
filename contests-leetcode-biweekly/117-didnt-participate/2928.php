<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $limit
     * @return Integer
     */
    function distributeCandies($n, $limit) {
        $count = 0;
        for ($i = 0; $i <= $limit; $i++) {
            for ($j = 0; $j <= $limit; $j++) {
                for ($k = 0; $k <= $limit; $k++) {
                    if ($i + $j + $k === $n) {
                        $count++;
                    }
                }
            }
        }

        return $count;
    }
}