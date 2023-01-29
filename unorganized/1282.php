<?php

class Solution {

    /**
     * Runtime: 28 ms, faster than 83.33% of PHP online submissions for Group the People Given the Group Size They Belong To.
    Memory Usage: 16 MB, less than 100.00% of PHP online submissions for Group the People Given the Group Size They Belong To.
     *
     * @param Integer[] $groupSizes
     * @return Integer[][]
     */
    function groupThePeople($groupSizes) {
        $answer = [];
        $groups = [];
        foreach ($groupSizes as $person => $groupSize) {
            if (!isset($groups[$groupSize])) {
                $groups[$groupSize] = [];
            }

            $groups[$groupSize][] = $person;
            if (count($groups[$groupSize]) === $groupSize) {
                $answer[] = $groups[$groupSize];
                unset($groups[$groupSize]);
            }
        }

        return $answer;
    }
}
