<?php

class Solution {

    /**
     * Runtime: 31 ms, faster than 32.00% of PHP online submissions for Decompress Run-Length Encoded List.
    Memory Usage: 20.1 MB, less than 48.00% of PHP online submissions for Decompress Run-Length Encoded List.
     *
     * @param Integer[] $nums
     * @return Integer[]
     */
    function decompressRLElist($nums) {
        $index = 0;
        $output = [];
        while ($index < count($nums)) {
            $current = [];
            for ($i = 0; $i < $nums[$index]; $i++) {
                $current[] = $nums[$index + 1];
            }

            $output[] = $current;
            $index += 2;
        }

        return array_merge(...$output);
    }
}
