<?php

class Solution {

    /**
     * Runtime: 19 ms, faster than 50.00% of PHP online submissions for Pancake Sorting.
    Memory Usage: 15.6 MB, less than 50.00% of PHP online submissions for Pancake Sorting.
     *
     * @param Integer[] $arr
     * @return Integer[]
     */
    function pancakeSort($arr) {
        $output = [];
        for ($i = count($arr); $i > 0; $i--) {
            $index = array_search($i, $arr);
            if ($index === $i -1) {
                continue;
            }

            $output[] = $index + 1;
            array_splice(
                $arr,
                0,
                $index + 1,
                array_reverse(array_slice($arr, 0, $index + 1))
            );

            $output[] = $i;
            array_splice(
                $arr,
                0,
                $i,
                array_reverse(array_slice($arr, 0, $i))
            );
        }

        return $output;
    }
}
