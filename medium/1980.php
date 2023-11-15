<?php

class Solution {

    /**
     * @param String[] $nums
     * @return String
     */
    function findDifferentBinaryString($nums)
    {
        $exists = [];
        foreach ($nums as $num) {
            $exists[$num] = true;
        }

        $length = strlen($nums[0]);
        $binaries = $this->generateBinary('', '', -1, $length);
        foreach ($binaries as $binary) {
            if (empty($exists[$binary])) {
                return $binary;
            }
        }

        return null;
    }

    function generateBinary($binary, $append, $currentLength, $targetLength)
    {
        if ($currentLength === $targetLength) {
            return [$binary];
        }

        $binary = $binary . $append;
        return array_merge(
            $this->generateBinary($binary, '0', $currentLength + 1, $targetLength),
            $this->generateBinary($binary, '1', $currentLength + 1, $targetLength)
        );
    }
}