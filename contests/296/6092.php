<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[][] $operations
     * @return Integer[]
     */
    function arrayChange($nums, $operations) {
        $keyMapping = array_flip($nums);
        foreach ($operations as $operation) {
            if (array_key_exists($operation[0], $keyMapping)) {
                $keyMapping[$operation[1]] = $keyMapping[$operation[0]];
                $nums[$keyMapping[$operation[0]]] = $operation[1];
            }
        }

        return $nums;
    }

    function test()
    {
        dd(
//            $this->arrayChange([1, 2, 4, 6], [[1,3],[4,7],[6,1]])
            $this->arrayChange([1, 2], [[1,3],[2,1],[3,2]])
        );
    }
}