<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function distinctAverages($nums) {
        $count = count($nums);
        sort($nums);
        $results = [];
        while ($count > 0) {
            $results[(($nums[0]) + $nums[$count - 1])] = true;
            $count -= 2;
            array_shift($nums);
            array_pop($nums);
        }

        return count($results);
    }

    function test()
    {
        dd($this->distinctAverages([4,1,4,0,3,5]));
    }
}