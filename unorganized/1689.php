<?php

class Solution {

    /**
     * Runtime: 245 ms, faster than 11.11% of PHP online submissions for Partitioning Into Minimum Number Of Deci-Binary Numbers.
    Memory Usage: 28.8 MB, less than 33.33% of PHP online submissions for Partitioning Into Minimum Number Of Deci-Binary Numbers.
     *
     * @param String $n
     * @return Integer
     */
    function minPartitions($n) {
        return max(array_map(function ($string) { return (int) $string; }, str_split($n)));
    }
}

print(print_r((new Solution())->minPartitions('32'), true));
