<?php

class Solution {

    /**
     * @param Integer[] $fruits
     * @return Integer
     */
    function totalFruit($fruits) {
        $max = 1;
        $currentSum = 1;
        $basketExists = [$fruits[0] => true];
        $currentCount = 1;
        $currentVal = $fruits[0];
        $currentValSum = 1;
        for ($i = 1; $i < count($fruits); $i++) {
            $fruit = $fruits[$i];
            if (!empty($basketExists[$fruit])) {
                $currentSum++;
                if ($fruit === $currentVal) {
                    $currentValSum++;
                } else {
                    $currentValSum = 1;
                }
            } elseif ($currentCount === 1) {
                $currentCount++;
                $currentSum++;
                $currentValSum = 1;
            } else {
                foreach ($basketExists as $fKey => $val) {
                    if ($fKey !== $currentVal) {
                        unset($basketExists[$fKey]);
                    }
                }

                $currentSum = $currentValSum + 1;
                $currentValSum = 1;
            }

            $basketExists[$fruit] = true;
            $currentVal = $fruit;
            $max = max($max, $currentSum);
        }


        return $max;
    }
}