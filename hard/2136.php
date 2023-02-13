<?php

class Solution {

    /**
     * @param Integer[] $plantTime
     * @param Integer[] $growTime
     * @return Integer
     */
    function earliestFullBloom($plantTime, $growTime) {
        $settings = [];
        foreach ($plantTime as $i => $plant) {
            $settings[$i] = [
                'plant' => $plant,
                'grow' => $growTime[$i],
            ];
        }

        usort($settings, function ($valueA, $valueB) {
            return $valueA['grow'] > $valueB['grow'];
        });

        $days = $settings[0]['grow'] + $settings[0]['plant'];
        for ($i = 1; $i < count($settings); $i++) {
            $grow = $settings[$i]['grow'];
            $days = max($days, $grow);
            $days += $settings[$i]['plant'];
        }

        return $days;
    }
}