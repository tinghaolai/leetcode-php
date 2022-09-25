<?php

class Solution {

    /**
     * @param Integer[] $players
     * @param Integer[] $trainers
     * @return Integer
     */
    function matchPlayersAndTrainers($players, $trainers) {
        sort($players);
        sort($trainers);
        $count = 0;
        $trainerIndex = 0;
        $trainerLength = count($trainers);
        foreach ($players as $player) {
            while ($trainers[$trainerIndex] < $player) {
                $trainerIndex++;
                if ($trainerIndex === $trainerLength) {
                    return $count;
                }
            }

            $count++;
            $trainerIndex++;

            if ($trainerIndex === $trainerLength) {
                return $count;
            }
        }

        return $count;
    }

    function test() {
        dd(
            $this->matchPlayersAndTrainers([4,7,9], [8,2,5,8]),
            $this->matchPlayersAndTrainers([1,1,1], [10])
        );
    }
}