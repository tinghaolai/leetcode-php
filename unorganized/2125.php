<?php

class Solution {

    /**
     * Runtime: 81 ms, faster than 80.00% of PHP online submissions for Number of Laser Beams in a Bank.
    Memory Usage: 18.6 MB, less than 100.00% of PHP online submissions for Number of Laser Beams in a Bank.
     *
     * @param String[] $bank
     * @return Integer
     */
    function numberOfBeams($bank) {
        $total = 0;
        $prevCount = 0;
        foreach ($bank as $row) {
            $currentCount = substr_count($row, '1');
            if ($currentCount) {
                $total += $currentCount * $prevCount;
                $prevCount = $currentCount;
            }
        }

        return $total;
    }
}
