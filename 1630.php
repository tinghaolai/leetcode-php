<?php

class Solution {

    /**
     * Runtime: 183 ms, faster than 100.00% of PHP online submissions for Arithmetic Subarrays.
    Memory Usage: 15.7 MB, less than 100.00% of PHP online submissions for Arithmetic Subarrays.
     *
     * @param Integer[] $nums
     * @param Integer[] $l
     * @param Integer[] $r
     * @return Boolean[]
     */
    function checkArithmeticSubarrays($nums, $l, $r) {
        $output = [];
        for ($i = 0; $i < count($l); $i++) {
            $subarray = array_slice($nums, $l[$i], $r[$i] - $l[$i] + 1);
            sort($subarray);
            $diff = $subarray[0] - $subarray[1];
            for ($j = 1; $j < count($subarray) -1; $j++) {
                if ($diff !== $subarray[$j] - $subarray[$j + 1]) {
                    $output[] = false;

                    continue 2;
                }
            }

            $output[] = true;
        }


        return $output;
    }
}
