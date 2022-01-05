<?php

class Solution {

    /**
     * Runtime: 12 ms, faster than 88.24% of PHP online submissions for Final Value of Variable After Performing Operations.
    Memory Usage: 15.6 MB, less than 58.82% of PHP online submissions for Final Value of Variable After Performing Operations.
     *
     * @param String[] $operations
     * @return Integer
     */
    function finalValueAfterOperations($operations) {
        return array_sum(array_map(function ($operation) {
            return ($operation === '++X' || $operation === 'X++') ? 1 : -1;
        }, $operations));
    }
}
