<?php

class Solution {

    /**
     * Runtime: 0 ms, faster than 100.00% of PHP online submissions for Build an Array With Stack Operations.
    Memory Usage: 15.8 MB, less than 100.00% of PHP online submissions for Build an Array With Stack Operations.
     *
     * @param Integer[] $target
     * @param Integer $n
     * @return String[]
     */
    function buildArray($target, $n) {
        $targetFlip = array_flip($target);
        $output = [];
        $nonExistsCount = 0;
        for ($i = 1; $i <= $n; $i++) {
            if (!array_key_exists($i, $targetFlip)) {
                $nonExistsCount++;
            } else {
                if ($nonExistsCount > 0) {
                    for ($j = 0; $j < $nonExistsCount; $j++) {
                        $output[] = 'Push';
                        $output[] = 'Pop';
                    }

                    $nonExistsCount = 0;
                }
                $output[] = 'Push';
            }
        }

        return $output;
    }
}
