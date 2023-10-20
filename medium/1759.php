<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countHomogenous($s) {
        $total = 1;
        $acc = 1;
        $last = $s[0];
        $length = strlen($s);
        for ($i = 1; $i < $length; $i++) {
            $current = $s[$i];
            if ($current === $last) {
                $acc++;
            } else {
                $acc = 1;
                $last = $current;
            }

            $total += $acc;
        }

        return $total % (1e9 + 7);
    }
}