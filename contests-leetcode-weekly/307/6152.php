<?php

class Solution {
    /**
     * @param Integer $initialEnergy
     * @param Integer $initialExperience
     * @param Integer[] $energy
     * @param Integer[] $experience
     * @return Integer
     */
    function minNumberOfHours($initialEnergy, $initialExperience, $energy, $experience) {
        $hour = 0;
        foreach ($energy as $i => $e) {
            if ($initialEnergy <= $e) {
                $hour += $e - $initialEnergy + 1;
                $initialEnergy = 1;
            } else {
                $initialEnergy -= $e;
            }

            if ($initialExperience <= $experience[$i]) {
                $hour += $experience[$i] - $initialExperience + 1;
                $initialExperience += $experience[$i] - $initialExperience + 1;
            }

            $initialExperience += $experience[$i];
        }
        ;
        return $hour;
    }

    function test()
    {
        dd(
//            $this->minNumberOfHours(
//            5,
//            3,
//            [1,4,3,2],
//            [2,6,3,1]
//            ),
            $this->minNumberOfHours(
                1,
                1,
                [1,1,1,1],
                [1,1,1,50]
            )
        );
    }
}