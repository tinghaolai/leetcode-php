<?php

class Solution {

    /**
     * Runtime: 57 ms, faster than 20.00% of PHP online submissions for Average Value of Even Numbers That Are Divisible by Three.
    Memory Usage: 19.6 MB, less than 20.00% of PHP online submissions for Average Value of Even Numbers That Are Divisible by Three.
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function averageValue($nums) {
        $count = 0;
        $sum = 0;
        foreach ($nums as $num) {
            if ($num % 6 === 0) {
                $count++;
                $sum += $num;
            }
        }

        return $count ? floor($sum / $count) : 0;
    }
}