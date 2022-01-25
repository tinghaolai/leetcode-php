<?php

class Solution {

    /**
     * Runtime: 8 ms, faster than 100.00% of PHP online submissions for Partition Labels.
    Memory Usage: 15.7 MB, less than 66.67% of PHP online submissions for Partition Labels.
     *
     * @param String $s
     * @return Integer[]
     */
    function partitionLabels($s) {
        $startIndex  = 0;
        $outputIndex = -1;
        $output      = [];
        $occur       = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (!array_key_exists($char, $occur)) {
                $startIndex = $i;
                $outputIndex++;
                $output[$outputIndex] = 0;
            } else if ($occur[$char] < $startIndex) {
                do {
                    $startIndex = $i - $output[$outputIndex - 1] - $output[$outputIndex];
                    $output[$outputIndex - 1] = $output[$outputIndex - 1] + $output[$outputIndex];
                    unset($output[$outputIndex]);
                    $outputIndex--;
                } while ($startIndex > $occur[$char]);
            }

            $output[$outputIndex]++;
            $occur[$char] = $i;
        }

        return $output;
    }
}
