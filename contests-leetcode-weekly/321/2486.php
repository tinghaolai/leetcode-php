<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function appendCharacters($s, $t) {
        $tIndex = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === $t[$tIndex]) {
                $tIndex++;
            }
        }

        return strlen($t) - $tIndex;
    }
}