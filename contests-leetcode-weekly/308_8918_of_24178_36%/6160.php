<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $queries
     * @return Integer[]
     */
    function answerQueries($nums, $queries) {
        sort($nums);
        for ($i = 1; $i < count($nums); $i++) {
            $nums[$i] += $nums[$i - 1];
        }

        foreach ($queries as $index => $max) {
            $currentMaxIndex = 0;
            while (
                isset($nums[$currentMaxIndex]) &&
                $max >= $nums[$currentMaxIndex]
            ) {
                $currentMaxIndex++;
            }

            $queries[$index] = $currentMaxIndex;
        }

        return $queries;
    }

    function test()
    {
        dd($this->answerQueries(
            [4,5,2,1], [3,10,21]),
            [2,3,4,5], [1]
        );
    }
}