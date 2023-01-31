<?php

class Solution {

    /**
     * @param Integer[] $pref
     * @return Integer[]
     */
    function findArray($pref) {
        $currentVal = $pref[0];
        for ($i = 1; $i < count($pref); $i++) {
            $pref[$i] = $currentVal ^ $pref[$i];
            $currentVal = $currentVal ^ $pref[$i];
        }

        return $pref;
    }
}