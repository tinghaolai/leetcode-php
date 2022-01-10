<?php

class Solution {

    /**
     * Runtime: 76 ms, faster than 60.00% of PHP online submissions for Decode XORed Array.
    Memory Usage: 17.7 MB, less than 100.00% of PHP online submissions for Decode XORed Array.
     *
     * @param Integer[] $encoded
     * @param Integer $first
     * @return Integer[]
     */
    function decode($encoded, $first) {
        $result = [$first];
        foreach ($encoded as $num) {
            $first ^= $num;
            $result[] = $first;
        }
        return $result;
    }
}
