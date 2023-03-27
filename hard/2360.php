<?php

class Solution {

    /**
     * @param Integer[] $edges
     * @return Integer
     */
    function longestCycle($edges) {
        $result = -1;
        $haveRun = [];
        foreach ($edges as $edge) {
            if (!empty($haveRun[$edge])) {
                continue;
            }

            $loop = [];
            $length = 0;
            $current = $edge;
            while (empty($loop[$current])) {
                if (
                    $current === -1 ||
                    (!empty($haveRun[$current]) && $haveRun[$current] >= 2)
                ) {
                    continue 2;
                }

                $length++;
                $loop[$current] = $length;
                $haveRun[$current] = empty($haveRun[$current]) ? 1 : $haveRun[$current] + 1;
                if ($haveRun[$current] === 2) {
                    continue 2;
                }
                $current = $edges[$current];
            }

            $length -= $loop[$current] - 1;
            $result = max($result, $length);
        }

        return $result;
    }
}