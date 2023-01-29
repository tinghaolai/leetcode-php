<?php

class Solution {

    /**
     * Runtime: 539 ms, faster than 100.00% of PHP online submissions for Maximum Number of Coins You Can Get.
    Memory Usage: 27.9 MB, less than 100.00% of PHP online submissions for Maximum Number of Coins You Can Get.
     *
     * @param Integer[] $piles
     * @return Integer
     */
    function maxCoins($piles) {
        sort($piles);
        $count = count($piles);
        $output = 0;
        $currentCount = 0;
        while ($currentCount * 3 !== $count) {
            $currentCount++;
            $output += $piles[count($piles) - 2 * $currentCount];
        }

        return $output;
    }
}
