<?php

class Solution {

    /**
     * @param Integer[][] $adjacentPairs
     * @return Integer[]
     */
    function restoreArray($adjacentPairs)
    {
        $pairCount = count($adjacentPairs);
        $startPair = array_pop($adjacentPairs);
        $starts = [
            [$startPair[0], $startPair[1]],
            [$startPair[1], $startPair[0]],
        ];

        $numAdjacentHash = [];
        foreach ($adjacentPairs as $pair) {
            foreach ($pair as $i => $num) {
                $adj = $i === 0 ? $pair[1] : $pair[0];
                if (empty($numAdjacentHash[$num])) {
                    $numAdjacentHash[$num] = [];
                }

                $numAdjacentHash[$num][$adj] = $adj;
            }
        }

        foreach ($starts as $start) {
            $arrangedPair = $start;
            $borderLeftIndex = 0;
            $borderRightIndex = 1;
            while (!empty($numAdjacentHash[$arrangedPair[$borderLeftIndex]])) {
                $leftVal = $arrangedPair[$borderLeftIndex];
                foreach ($numAdjacentHash[$leftVal] as $adjacentHash) {
                    $adj = $adjacentHash;
                }

                unset($numAdjacentHash[$leftVal][$adj]);
                unset($numAdjacentHash[$adj][$leftVal]);
                $borderLeftIndex--;
                $arrangedPair[$borderLeftIndex] = $adj;
            }

            while (!empty($numAdjacentHash[$arrangedPair[$borderRightIndex]])) {
                $rightVal = $arrangedPair[$borderRightIndex];
                foreach ($numAdjacentHash[$rightVal] as $adjacentHash) {
                    $adj = $adjacentHash;
                }

                unset($numAdjacentHash[$rightVal][$adj]);
                unset($numAdjacentHash[$adj][$rightVal]);
                $borderRightIndex++;
                $arrangedPair[$borderRightIndex] = $adj;
            }

            if (count($arrangedPair) === $pairCount + 1) {
                ksort($arrangedPair);
                return array_values($arrangedPair);
            }
        }

        return [];
    }

}