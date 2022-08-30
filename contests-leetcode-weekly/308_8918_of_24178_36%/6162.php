<?php

class Solution {

    /**
     * @param String[] $garbage
     * @param Integer[] $travel
     * @return Integer
     */
    function garbageCollection($garbage, $travel) {
        $count = [
            'G' => 0,
            'P' => 0,
            'M' => 0,
        ];

        $houseRun = [
            'G' => 0,
            'P' => 0,
            'M' => 0,
        ];

        foreach ($garbage as $houseIndex => $items) {
            for ($i = 0; $i < strlen($items); $i++) {
                $item = $items[$i];
                $count[$item]++;
                $houseRun[$item] = $houseIndex;
            }
        }

        for ($i = 1; $i < count($travel); $i++) {
            $travel[$i] += $travel[$i - 1];
        }

        $total = 0;
        foreach ($houseRun as $houseIndex) {
            if ($houseIndex === 0) {
                continue;
            }

            $total += $travel[$houseIndex - 1];
        }

        return array_sum($count) + $total;
    }

    function test()
    {
        dd(
            $this->garbageCollection(["G","P","GP","GG"], [2,4,3]),
            $this->garbageCollection(["MMM","PGM","GP"], [3,10])
        );
    }
}