<?php

class Solution {

    /**
     * @param Float $celsius
     * @return Float[]
     */
    function convertTemperature($celsius) {
        return [$celsius + 273.15, $celsius * 1.8 +32];
    }
}