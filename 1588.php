<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function sumOddLengthSubarrays($arr) {
        $sum = 0;
        foreach ($arr as $index => $num) {
            $sum += $num;
            $currentSum = $num;
            $indexType = $index % 2;
            for ($i = $index + 1; $i < count ($arr); $i++) {
                $currentSum += $arr[$i];
                if ($indexType === $i % 2) {
                    $sum += $currentSum;
                }
            }
        }

        return $sum;
    }
}
