<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxScore($nums) {
        rsort($nums);
        $result = 0;
        $current = 0;
        foreach ($nums as $num) {
            $current += $num;
            if ($current > 0) {
                $result++;
            }
        }

        return $result;
    }

    function test()
    {
//        expect: 20
        dd($this->maxScore([-687767,-860350,950296,52109,510127,545329,-291223,-966728,852403,828596,456730,-483632,-529386,356766,147293,572374,243605,931468,641668,494446]));
    }
}