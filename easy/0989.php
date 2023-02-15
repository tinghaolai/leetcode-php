<?php

class Solution {

    /**
     * @param Integer[] $num
     * @param Integer $k
     * @return Integer[]
     */
    function addToArrayForm($num, $k) {
        $carry = 0;
        $k = (string) $k;
        $j = count($num) - 1;
        for ($i = 1; $i <= strlen($k); $i++) {
            $val = (int) $k[-$i];
            if ($j >= 0) {
                $num[$j] += $val + $carry;
                if ($num[$j] >= 10) {
                    $num[$j] -= 10;
                    $carry = 1;
                } else {
                    $carry = 0;
                }
            } else {
                $val += $carry;
                if ($val === 10) {
                    $carry = 1;
                    array_unshift($num, 0);
                } else {
                    $carry = 0;
                    array_unshift($num, $val);
                }
            }

            $j--;
        }

        while ($carry) {
            if ($j < 0) {
                array_unshift($num, 1);
                break;
            } elseif ($num[$j] === 9) {
                $num[$j] = 0;
                $carry = 1;
                $j--;
            } else {
                $num[$j] += 1;
                $carry = 0;
            }
        }

        return $num;
    }
}