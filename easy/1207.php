<?php

require 'TestFunctions.php';

class Solution {

    /**
     * Runtime: 17 ms, faster than 50.00% of PHP online submissions for Unique Number of Occurrences.
    Memory Usage: 19 MB, less than 100.00% of PHP online submissions for Unique Number of Occurrences.
     *
     * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr) {
        $counts = array_count_values($arr);
        return count(array_unique($counts)) === count($counts);
    }

    public function test()
    {
        return $this->uniqueOccurrences([1,2,2,1,1,3]);
    }
}