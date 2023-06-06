<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeSmallestPalindrome($s) {
        $length = strlen($s);
        $i = 0;
        $j = $length - 1;
        $resultLeft = '';
        $resultRight = '';
        while ($i <= $j) {
            $charLeft = $s[$i];
            $charRight = $s[$j];
            if ($i === $j) {
                $resultLeft .= $charLeft;
                break;
            }

            if (ord($charLeft) <= ord($charRight)) {
                $char = $charLeft;
            } else {
                $char = $charRight;
            }

            $resultLeft .= $char;
            $resultRight = $char . $resultRight;
            $i++;
            $j--;
        }

        return $resultLeft . $resultRight;
    }
}