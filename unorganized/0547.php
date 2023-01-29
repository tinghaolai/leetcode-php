<?php

class Solution {

    /**
     * Runtime: 141 ms, faster than 36.84% of PHP online submissions for Number of Provinces.
    Memory Usage: 17.8 MB, less than 52.63% of PHP online submissions for Number of Provinces.
     *
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {
        $isConnected = array_map(function ($connect) {
            $indexConvert = [];
            foreach ($connect as $index => $connect) {
                if ($connect) {
                    $indexConvert[$index] = true;
                }
            }

            return $indexConvert;
        }, $isConnected);

        $circles = [];
        foreach ($isConnected as $person => $connect) {
            foreach ($circles as $circleIndex => $circle) {
                if (isset($circle[$person])) {
                    $connect = $connect + $circle;
                    unset($circles[$circleIndex]);
                }
            }

            $circles[] = $connect;
        }

        return count($circles);
    }
}
