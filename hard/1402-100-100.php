<?php

class Solution {

    /**
     * Runtime: 21 ms, faster than 100.00% of PHP online submissions for Reducing Dishes.
    Memory Usage: 19.2 MB, less than 100.00% of PHP online submissions for Reducing Dishes.
     *
     * @param Integer[] $satisfaction
     * @return Integer
     */
    function maxSatisfaction($satisfaction) {
        rsort($satisfaction);
        $coefficientTotal = 0;
        $total = 0;
        $i = 0;
        while (
            $i < count($satisfaction) &&
            (
                $satisfaction[$i] >= 0 ||
                $total > -$satisfaction[$i]
            )
        ) {
            $total += $satisfaction[$i];
            $coefficientTotal += $total;
            $i++;
        }

        return $coefficientTotal;
    }

    function test()
    {
        return $this->maxSatisfaction([-1, -8, 0, 5, -9]);
//        return $this->maxSatisfaction([4, 3, 2]);
//        return $this->maxSatisfaction([-1, -4, -5]);
    }
}