<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function applyOperations($nums) {
        $result = [];
        $zeros = [];
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] !== $nums[$i + 1]) {
                if ($nums[$i] === 0) {
                    $zeros[] = 0;
                } else {
                    $result[] = $nums[$i];
                }

                continue;
            }

            if ($nums[$i] === 0) {
                $zeros[] = 0;
            } else {
                $result[] = $nums[$i] * 2;
            }

            $nums[$i + 1] = 0;
        }

        return array_merge($result, $zeros);
    }
}