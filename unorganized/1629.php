<?php

class Solution {

    /**
     * @param Integer[] $releaseTimes
     * @param String $keysPressed
     * @return String
     */
    function slowestKey($releaseTimes, $keysPressed) {
        $index = false;
        $max  = 0;
        $prev = 0;
        foreach ($releaseTimes as $currentIndex => $time) {
            $current = $time - $prev;
            if (
                $current > $max ||
                ($current === $max && $keysPressed[$currentIndex] > $keysPressed[$index])
            ) {
                $index = $currentIndex;
                $max = $current;
            }

            $prev = $time;
        }

        return $keysPressed[$index];
    }
}
