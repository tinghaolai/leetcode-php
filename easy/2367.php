<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $diff
     * @return Integer
     */
    function arithmeticTriplets($nums, $diff) {
        $numNeed = [];
        foreach ($nums as $num) {
            $numNeed[$num] = 2;
        }

        $count = 0;
        foreach ($nums as $num) {
            foreach ([1, 2] as $rate) {
                $diffNum = $num - $diff * $rate;
                if (isset($numNeed[$diffNum])) {
                    $numNeed[$diffNum]--;
                    if ($numNeed[$diffNum] === 0) {
                        $count++;
                    }
                }
            }
        }

        return $count;
    }

    function test() {
        dd($this->arithmeticTriplets([0,1,4,6,7,10], 3));
    }
}