<?php

class Solution {
    /**
     * Runtime: 306 ms, faster than 100.00% of PHP online submissions for Reduce Array Size to The Half.
    Memory Usage: 32.7 MB, less than 100.00% of PHP online submissions for Reduce Array Size to The Half.
     *
     * @param Integer[] $arr
     * @return Integer
     */
    function minSetSize($arr) {
        $min = ceil(count($arr) / 2);
        $counts = array_values(array_count_values($arr));
        rsort($counts);
        $length = count($counts);
        $sum = 0;
        for ($i = 0; $i < $length; $i++) {
            $sum += $counts[$i];
            if ($sum >= $min) {
                break;
            }
        }

        return $i + 1;
    }

    public function test() {
        return $this->minSetSize([9,77,63,22,92,9,14,54,8,38,18,19,38,68,58,19]);
    }
}