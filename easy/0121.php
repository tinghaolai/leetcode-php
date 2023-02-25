<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = $prices[0];
        $result = 0;
        for ($i = 0; $i < count($prices); $i++) {
            $price = $prices[$i];
            if ($price > $min) {
                $result = max($result, $price - $min);
            }

            $min = min($min, $price);
        }

         return $result;
    }
}