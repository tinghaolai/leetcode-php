<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function minReorder($n, $connections)
    {
        $paths = [];
        foreach ($connections as $connection) {
            $from = $connection[0];
            $to = $connection[1];
            foreach ([$from, $to] as $direction) {
                if (empty($paths[$direction])) {
                    $paths[$direction] = [];
                }
            }

            $paths[$from][$to] = 'to';
            $paths[$to][$from] = 'from';
        }

        $queue = new SplQueue();
        $queue->push([
            'run' => 0,
            'direction' => '',
        ]);

        $haveRun = [];
        $result = 0;
        while (!$queue->isEmpty()) {
            $pop = $queue->pop();
            $run = $pop['run'];
            $direction = $pop['direction'];
            if (!empty($haveRun[$run])) {
                continue;
            }

            if ($direction === 'to') {
                $result++;
            }

            $haveRun[$run] = true;
            foreach ($paths[$run] as $next => $direction) {
                $queue->push([
                    'run' => $next,
                    'direction' => $direction,
                ]);
            }
        }

        return $result;
    }

}