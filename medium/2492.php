<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function minScore($n, $roads) {
        $roadMapping = [];
        $roadRunned = [];
        foreach ($roads as $road) {
            if (empty($roadMapping[$road[0]])) {
                $roadMapping[$road[0]] = [];
            }

            $roadMapping[$road[0]][$road[1]] = $road[2];
            if (empty($roadMapping[$road[1]])) {
                $roadMapping[$road[1]] = [];
            }

            $roadMapping[$road[1]][$road[0]] = $road[2];
        }

        $min = false;
        $queue = new SplQueue();
        $queue->push(1);
        while (!$queue->isEmpty()) {
            $run = $queue->pop();
            if (!empty($roadRunned[$run])) {
                continue;
            }

            $roadRunned[$run] = true;
            foreach ($roadMapping[$run] as $next => $score) {
                if ($min === false) {
                    $min = $score;
                } else {
                    $min = min($min, $score);
                }

                $queue->push($next);
            }
        }

        return $min;
    }
}