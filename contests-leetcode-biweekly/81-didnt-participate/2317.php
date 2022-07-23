<?php

class Solution {

    /**
     * Runtime: 241 ms
    Memory Usage: 29.5 MB
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumXOR($nums) {
        $result = 0;
        foreach ($nums as $num) {
            $result |= $num;
        }

        return $result;
    }

    function test()
    {
        dd(
            $this->maximumXOR([3, 2, 4, 6])
        );
    }
}