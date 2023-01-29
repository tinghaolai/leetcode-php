<?php

class Solution {

    /**
     * Runtime: 112 ms, faster than 33.33% of PHP online submissions for Sort Array By Parity II.
    Memory Usage: 19.2 MB, less than 100.00% of PHP online submissions for Sort Array By Parity II.
     *
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArrayByParityII($nums) {
        $wrongNums = [[], []];
        foreach ($nums as $index => $num) {
            if (($indexType = $index % 2) !== $num % 2) {
                $wrongNums[$indexType][] = $index;
            }
        }

        foreach ($wrongNums[0] as $index => $wrongEvenIndex) {
            $temp = $nums[$wrongEvenIndex];
            $wrongOddIndex = $wrongNums[1][$index];
            $nums[$wrongEvenIndex] = $nums[$wrongOddIndex];
            $nums[$wrongOddIndex] = $temp;
        }

        return $nums;
    }
}
