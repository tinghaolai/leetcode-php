<?php

class Solution {

    /**
     * Runtime: 3728 ms, faster than 5.26% of PHP online submissions for Contains Duplicate II.
    Memory Usage: 30.5 MB, less than 68.42% of PHP online submissions for Contains Duplicate II.
     *
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
        if (!$k) {
            return false;
        }

        $currentSet = array_slice($nums, 0, $k);
        if (count($currentSet) !== count(array_unique($currentSet))) {
            return true;
        }

        for ($i = $k; $i < count($nums); $i++) {
            if (in_array($nums[$i], $currentSet)) {
                return true;
            }

            array_shift($currentSet);
            $currentSet[] = $nums[$i];
        }

        return false;
    }
}
