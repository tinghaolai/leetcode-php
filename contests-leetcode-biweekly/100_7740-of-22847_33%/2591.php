<?php

class Solution {

    /**
     * @param Integer $money
     * @param Integer $children
     * @return Integer
     */
    function distMoney($money, $children) {
        if ($children > $money) {
            return -1;
        }

        $result = 0;
        while ($money >= 8 && $children) {
            $children --;
            $money-=8;
            $result++;
        }

        if ($money === 4 && $children === 1) {
            $result--;
        }

        if ($money !== 0 && $children === 0) {
            $result--;
        }

        $moneyFromPrev = 0;
        while ($children > $money) {
            if ($moneyFromPrev === 0) {
                $moneyFromPrev = 7;
                $result--;
            }

            $moneyFromPrev--;
            $children--;

        }

        return max($result, 0);
    }
}