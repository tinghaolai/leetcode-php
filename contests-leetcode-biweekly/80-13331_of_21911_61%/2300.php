<?php

class Solution {

    /**
     * Runtime: 758 ms
    Memory Usage: 46.5 MB
     *
     * @param Integer[] $spells
     * @param Integer[] $potions
     * @param Integer $success
     * @return Integer[]
     */
    function successfulPairs($spells, $potions, $success) {
        $output = [];
        sort($potions);
        $indexMapping = [];
        $potionsLength = count($potions);
        for($i = $potionsLength -1;  $i >= 0; $i--) {
            $indexMapping[$potions[$i]] = $i;
        }

        foreach ($spells as $spell) {
            $min = $this->binaryCeilSearch($potions, ceil($success / $spell));
            $output[] = $min === -1 ? 0 : $potionsLength - $indexMapping[$min];
        }

        return $output;
    }

    function successfulPairs_timeout($spells, $potions, $success) {
        $output = [];
        sort($potions);
        $potionsLength = count($potions);
        foreach ($spells as $spell) {
            $match = 0;
            foreach ($potions as $index => $potion) {
                if ($potion * $spell >= $success) {
                    $match = $potionsLength - $index;
                    break;
                }
            }

            $output[] = $match;
        }

        return $output;
    }

    function test()
    {
//        Input: spells = [5,1,3], potions = [1,2,3,4,5], success = 7

        dd(
//            $this->successfulPairs([5,1,3], [1,2,3,4,5], 7)
            $this->successfulPairs([3,1,2], [8,5,8], 16)
        );
    }

    function binaryCeilSearch($array, $target)
    {
        $start = 0;
        $end = count($array) - 1;
        if ($target > $array[$end]) {
            return -1;
        }

        if ($target < $array[$start]) {
            return $array[$start];
        }

        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($array[$middle] === $target) {
                return $target;
            }

            if ($array[$middle] < $target) {
                $start = $middle + 1;
            } else {
                $ceil = $array[$middle];
                $end = $middle - 1;
            }
        }

        return $ceil;
    }
}