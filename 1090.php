<?php

class Solution {

    /**
     * Comment: the question is hard to understand,
     * the sum counting count by value of values array which index is as same as labels array,
     * which means each value in values array has one tag, and each tag has use limit.
     * To find the max subset, collect value from largest value to lowest until meet $numWanted,
     * but if tag of current value has reach $useLimit,
     * then you can't collect current value.
     */

    /**
     * Runtime: 86 ms, faster than 100.00% of PHP online submissions for Largest Values From Labels.
    Memory Usage: 25.9 MB, less than 100.00% of PHP online submissions for Largest Values From Labels.
     *
     * @param Integer[] $values
     * @param Integer[] $labels
     * @param Integer $numWanted
     * @param Integer $useLimit
     * @return Integer
     */
    function largestValsFromLabels($values, $labels, $numWanted, $useLimit) {
        $output = 0;
        $labelsCount = [];
        array_multisort($values, SORT_DESC, $labels, $labels);
        foreach ($values as $index => $value) {
            $label = $labels[$index];
            if (!isset($labelsCount[$label])) {
                $labelsCount[$label] = 0;
            }

            if ($labelsCount[$label] < $useLimit) {
                $labelsCount[$label]++;
                $numWanted--;
                $output += $value;
                if (!$numWanted) {
                    return $output;
                }
            }
        }

        return $output;
    }
}
