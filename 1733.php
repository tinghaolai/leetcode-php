<?php

class Solution {

    /**
     * Runtime: 112 ms, faster than 9.09% of PHP online submissions for Count Items Matching a Rule.
    Memory Usage: 27.3 MB, less than 36.36% of PHP online submissions for Count Items Matching a Rule.
     *
     * @param String[][] $items
     * @param String $ruleKey
     * @param String $ruleValue
     * @return Integer
     */
    function countMatches($items, $ruleKey, $ruleValue) {
        switch (($ruleKey)) {
            case 'type':
                $key = 0;
                break;
            case 'color':
                $key = 1;
                break;
            default:
                $key = 2;
                break;
        }

        return count(array_filter($items, function ($item) use ($key, $ruleValue) {
            return $item[$key] === $ruleValue;
        }));
    }
}
