<?php

class Solution {

    /**
     * Runtime: 27 ms, faster than 100.00% of PHP online submissions for Defuse the Bomb.
    Memory Usage: 19.1 MB, less than 100.00% of PHP online submissions for Defuse the Bomb.
     *
     * @param Integer[] $code
     * @param Integer $k
     * @return Integer[]
     */
    function decrypt($code, $k) {
        $output = [];
        $codeCount = count($code);
        foreach ($code as $index => $number) {
            $sum = 0;
            if ($k === 0) {
                $output[$index] = $sum;
            } else {
                for ($i = 1; $i <= abs($k); $i++) {
                    $currentIndex = ($k > 0) ? $index + $i : $index - $i;
                    if ($currentIndex < 0) {
                        $currentIndex += $codeCount;
                    } else if ($currentIndex >= $codeCount) {
                        $currentIndex -= $codeCount;
                    }

                    $sum += $code[$currentIndex];
                }

                $output[$index] = $sum;
            }
        }

        return $output;
    }
}
