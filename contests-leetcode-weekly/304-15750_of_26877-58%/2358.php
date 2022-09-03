<?php

class Solution {

    /**
     * @param Integer[] $grades
     * @return Integer
     */
    function maximumGroups($grades) {
        $length = count($grades);
        $total = 0;
        $max = 0;
        $index = 1;
        while ($total + $index <= $length) {
            $max++;
            $total+=$index;
            $index++;
        }

        return $max;
    }

    function test()
    {
        dd(
            $this->maximumGroups([10,6,12,7,3,5]),
            $this->maximumGroups([8,8])
        );
    }
}