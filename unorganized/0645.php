<?php

class Solution {

    /**
     * Runtime: 72 ms, faster than 66.67% of PHP online submissions for Set Mismatch.
    Memory Usage: 21.5 MB, less than 33.33% of PHP online submissions for Set Mismatch.
     *
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findErrorNums($nums) {
        $notFound = [];
        for ($i = 1; $i <= count($nums); $i++) {
            $notFound[$i] = true;
        }

        $found = [];
        $output = [];
        foreach ($nums as $num) {
            if (isset($found[$num])) {
                $output[] = $num;
            } else {
                $found[$num] = true;
            }

            unset($notFound[$num]);
        }

        return array_merge($output, array_keys($notFound));
    }
}
