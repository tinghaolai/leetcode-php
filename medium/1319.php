<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function makeConnected($n, $connections) {
        $nCheck = [];
        for ($i = 0; $i < $n; $i++) {
            $nCheck[$i] = true;
        }

        $paths = [];
        $hasNumber = [];
        foreach ($connections as $connection) {
            if (empty($paths[$connection[0]])) {
                $paths[$connection[0]] = [];
            }

            if (empty($paths[$connection[1]])) {
                $paths[$connection[1]] = [];
            }

            $paths[$connection[0]][] = $connection[1];
            $paths[$connection[1]][] = $connection[0];
            $hasNumber[$connection[0]] = true;
            $hasNumber[$connection[1]] = true;
        }

        $groupCount = 0;
        $haveRun = [];
        $extraLine = 0;
        while ($n) {
            $groupCount++;
            $queue = new \SplQueue();
            $queue->push(array_key_first($nCheck));
            $nodeCount = 0;
            $lineCount = 0;
            while (!$queue->isEmpty()) {
                $run = $queue->pop();
                if (!empty($haveRun[$run])) {
                    continue;
                }

                $nodeCount++;
                unset($nCheck[$run]);
                $n--;

                $haveRun[$run] = true;
                if (!empty($paths[$run])) {
                     foreach ($paths[$run] as $next) {
                         $lineCount++;
                        $queue->push($next);
                    }
                }
            }

            $lineCount /= 2;
            $lineNeed = $nodeCount - 1;
            if ($lineCount > $lineNeed) {
                $extraLine += $lineCount - $lineNeed;
            }
        }

        $extraLineNeed = $groupCount - 1;
        if ($extraLine < $extraLineNeed) {
            return -1;
        }

        return $extraLineNeed;
    }

}