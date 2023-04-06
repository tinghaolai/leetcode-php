<?php

class Solution {

    /**
     * @param String $s
     * @param String $chars
     * @param Integer[] $vals
     * @return Integer
     */
    function maximumCostSubstring($s, $chars, $vals) {
        $length = strlen($s);
        $result = 0;
        $charsMappping = [];
        $charLength = strlen($chars);
        for ($i = 0; $i < $charLength; $i++) {
            $charsMappping[$chars[$i]] = $vals[$i];
        }

        $current = 0;
        for ($i = 0; $i < $length; $i++) {
            $char = $s[$i];
            if (isset($charsMappping[$char])) {
                $charVal = $charsMappping[$char];
            } else {
                $charVal = ord($char) - 96;
            }

            $current += $charVal;
            if ($current < 0) {
                $current = 0;
                continue;
            }

            $result = max($result, $current);
        }

        return $result;
    }
}