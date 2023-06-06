<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minLength($s) {
        $nextStackIndex = 0;
        $stack = [];
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            if ($nextStackIndex > 0) {
                if ($s[$i] === 'B' && $stack[$nextStackIndex - 1] === 'A') {
                    $nextStackIndex--;
                    continue;
                }

                if ($s[$i] === 'D' && $stack[$nextStackIndex - 1] === 'C') {
                    $nextStackIndex--;
                    continue;
                }
            }

            $stack[$nextStackIndex] = $s[$i];
            $nextStackIndex++;
        }

        return $nextStackIndex;
    }
}