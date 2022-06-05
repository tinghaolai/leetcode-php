<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function partitionArray($nums, $k) {
        sort($nums);
        $output = 1;
        $currentMin = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] - $currentMin > $k) {
                $output++;
                $currentMin = $nums[$i];
            }
        }

        return $output;
    }

    public function test()
    {
        dd(
            $this->partitionArray([3,6,1,2,5], 2)
        );
    }
}