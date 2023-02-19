<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function minOperations($n) {
        $n = decbin($n);
        $result = 0;
//        dd($n);
        $currentOneCount = 0;
        for ($i = strlen($n) - 1; $i >= 0; $i--) {
            if ($n[$i] === '1') {
                $currentOneCount++;
            } else {
                if ($currentOneCount === 1) {
                    $result++;
                    $currentOneCount = 0;
                } else if ($currentOneCount > 1) {
                    $result++;
                    $currentOneCount = 1;
                } else {
                    $currentOneCount = 0;
                }
            }
        }

        if ($currentOneCount === 1) {
            $result++;
        } elseif ($currentOneCount > 1) {
            $result += 2;
        }

        return $result;
    }
}