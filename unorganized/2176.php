<?php

class Solution {

    /**
     * Runtime: 49 ms, faster than 41.67% of PHP online submissions for Count Equal and Divisible Pairs in an Array.
    Memory Usage: 19.3 MB, less than 8.33% of PHP online submissions for Count Equal and Divisible Pairs in an Array.
     *
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countPairs($nums, $k) {
        $output = 0;
        $count = [];
        foreach ($nums as $index => $num) {
            if (isset($count[$num])) {
                $output += $count[$num]['valid'];
                foreach ($count[$num]['invalid'] as $invalidIndex) {
                    if ($invalidIndex * $index % $k === 0) {
                        $output += 1;
                    }
                }
            } else {
                $count[$num] = [
                    'valid'   => 0,
                    'invalid' => [],
                ];
            }

            if ($index % $k === 0) {
                $count[$num]['valid'] += 1;
            } else {
                $count[$num]['invalid'][] = $index;
            }
        }

        return $output;
    }
}
