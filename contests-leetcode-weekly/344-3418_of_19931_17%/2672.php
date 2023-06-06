<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function colorTheArray($n, $queries) {
        $nums = array_fill(0, $n, 0);
        $result = [];
        $rightSameCount = 0;
        $sameHash = [];
        foreach ($queries as $i => $query) {
            $changeIndex = $query[0];
            $originalColor = $nums[$changeIndex];
            $changedColor = $query[1];
            if ($originalColor === $changedColor) {
                $result[] = $rightSameCount;
                continue;
            }

            $nums[$changeIndex] = $changedColor;
            $rightIndex = $changeIndex + 1;
            if ($rightIndex < $n) {
                $rightColor = $nums[$rightIndex];
                if (
                    $originalColor === $rightColor &&
                    isset($sameHash[$rightIndex])
                ) {
                    $rightSameCount--;
                    unset($sameHash[$rightIndex]);
                }

                if ($changedColor === $rightColor) {
                    $rightSameCount++;
                    $sameHash[$rightIndex] = true;
                }
            }

            $prevIndex = $changeIndex - 1;
            if ($prevIndex >= 0) {
                $prevColor = $nums[$prevIndex];
                if (
                    $originalColor === $prevColor &&
                    isset($sameHash[$changeIndex])
                ) {
                    $rightSameCount--;
                    unset($sameHash[$changeIndex]);
                }

                if ($changedColor === $prevColor) {
                    $rightSameCount++;
                    $sameHash[$changeIndex] = true;
                }
            }

            $result[] = $rightSameCount;
        }

        return $result;
    }
}