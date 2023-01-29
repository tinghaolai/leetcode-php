<?php

class Solution {

    /**
     * Runtime: 16 ms, faster than 58.33% of PHP online submissions for Richest Customer Wealth.
    Memory Usage: 16.2 MB, less than 66.67% of PHP online submissions for Richest Customer Wealth.
     *
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts) {
        return max(array_map(function ($account) { return array_sum($account); }, $accounts));
    }
}
