<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumCounts($nums)
    {
        $result = 0;
        $length = count($nums);
        foreach ($nums as $i => $num) {
            $result++;
            $currentHash = [$num => true];
            $currentCount = 1;
            for ($j = $i + 1; $j < $length; $j++) {
                if (empty($currentHash[$nums[$j]])) {
                    $currentHash[$nums[$j]] = true;
                    $currentCount++;
                }

                $result += $currentCount * $currentCount;
            }
        }


        return $result;
    }
}