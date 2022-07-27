<?php

class Solution {

    /**
     * From last passenger - 1 if last bus full, From start if bus if not full
     */

    /**
     * Runtime: 443 ms
    Memory Usage: 39.7 MB
     *
     * @param Integer[] $buses
     * @param Integer[] $passengers
     * @param Integer $capacity
     * @return Integer
     */
    function latestTimeCatchTheBus($buses, $passengers, $capacity) {
        sort($buses);
        sort($passengers);
        $onBoard = [];
        $passengerIndex = 0;
        foreach ($buses as $bus) {
            $currentOnBoardCount = 0;
            while (
                $passengerIndex < count($passengers) &&
                $passengers[$passengerIndex] <= $bus &&
                $currentOnBoardCount < $capacity
            ) {
                $onBoard[$passengers[$passengerIndex]] = true;
                $passengerIndex++;
                $currentOnBoardCount++;
            }
        }

        $latest = $currentOnBoardCount === $capacity ? $passengers[$passengerIndex - 1] - 1 : $bus;
        while(isset($onBoard[$latest])) {
            $latest--;
        }

        return $latest;
    }

    function test()
    {
        dd(
//            $this->latestTimeCatchTheBus([10, 20], [2, 17, 18, 19], 2),
//            $this->latestTimeCatchTheBus([20, 30, 10], [19,13,26,4,25,11,21], 2),
            $this->latestTimeCatchTheBus([3], [2, 4], 2)

        );
    }

//Input: buses = [10,20], passengers = [2,17,18,19], capacity = 2
//Output: 16

//Input: buses = [20,30,10], passengers = [19,13,26,4,25,11,21], capacity = 2
//Output: 20
}