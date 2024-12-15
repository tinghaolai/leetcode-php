<?php

class Solution {

    /**
     * @param Integer[][] $events
     * @return Integer
     */
    function buttonWithLongestTime($events) {
        $max = $events[0][0];
        $maxCount = $events[0][1];
        $lastCount = $maxCount;
        for ($i = 1; $i < count($events); $i++) {
            $currentCount = $events[$i][1] - $lastCount ;
            if ($currentCount === $maxCount) {
                $max = min($max, $events[$i][0]);
            } elseif ($currentCount > $maxCount) {
                $max = $events[$i][0];
                $maxCount = $currentCount;
            }

            $lastCount = $events[$i][1];
        }


        return $max;
    }
}
