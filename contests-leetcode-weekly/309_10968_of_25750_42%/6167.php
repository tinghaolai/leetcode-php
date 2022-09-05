<?php

class Solution {

    /**
     * @param String $s
     * @param Integer[] $distance
     * @return Boolean
     */
    function checkDistances($s, $distance) {
        $distances = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (!isset($distances[$s[$i]])) {
                $distances[$s[$i]] = $i;
            } else {
                $distances[$s[$i]] = $i - $distances[$s[$i]];
            }
        }

        foreach ($distances as $string => $dis) {
            if ($distance[ord($string) - 97] !== $dis - 1) {
                return false;
            }
        }

        return true;
    }

    function test()
    {
        dd($this->checkDistances('abaccb', [1,3,0,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]));
    }
}