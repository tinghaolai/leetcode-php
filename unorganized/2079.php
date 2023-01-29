<?php

class Solution {

    /**
     * Runtime: 16 ms, faster than 100.00% of PHP online submissions for Watering Plants.
    Memory Usage: 19.4 MB, less than 100.00% of PHP online submissions for Watering Plants.
     *
     * @param Integer[] $plants
     * @param Integer $capacity
     * @return Integer
     */
    function wateringPlants($plants, $capacity) {
        $output       = 0;
        $plantsLength = count($plants);
        $plantWatered = 0;
        while ($plantWatered !== $plantsLength) {
            $currentWater = $capacity;
            $output += $plantWatered;
            while ($currentWater && $plantWatered !== $plantsLength) {
                if ($currentWater < $plants[$plantWatered]) {
                    $output += $plantWatered;
                    continue 2;
                }

                $currentWater -= $plants[$plantWatered];
                $plantWatered++;
                $output++;
            }

            if ($plantWatered !== $plantsLength) {
                $output += $plantWatered;
            }
        }

        return $output;
    }

    function test() {
        return $this->wateringPlants([1,1,1,4,2,3], 4);
    }
}
