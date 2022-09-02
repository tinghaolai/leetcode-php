<?php

class Solution {

    /**
     * @param String $pattern
     * @return String
     */
    function smallestNumber($pattern) {
        $output = [1];
        for ($i = 0; $i < strlen($pattern); $i++) {
            $number = $i + 2;
            $outputIndex = $i + 1;
            $output[$outputIndex] = $number;
            $currentIndex = $outputIndex;
            while ($pattern[$currentIndex - 1] === 'D' && $currentIndex !== 0) {
                $temp = $output[$currentIndex];
                $output[$currentIndex] = $output[$currentIndex - 1];
                $output[$currentIndex - 1] = $temp;
                $currentIndex--;
            }
        }

        return implode('', $output);
    }

    function test()
    {
        dd(
            $this->smallestNumber("IIIDIDDD"),
            $this->smallestNumber("DDD")
        );
    }
}