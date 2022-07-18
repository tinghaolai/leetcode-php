<?php

class Solution {

    /**
     * Runtime: 11 ms
    Memory Usage: 19.4 MB
     * Your runtime beats 94.74 % of php submissions.
     * Your memory usage beats 26.32 % of php submissions
     *
     * @param String $s
     * @return Integer
     */
    function countAsterisks($s) {
        $count = 0;
        foreach (explode('|', $s) as $index => $string) {
            if ($index % 2 === 0) {
                for ($i = 0; $i < strlen($string); $i++) {
                    if ($string[$i] === '*') {
                        $count++;
                    }
                }
            }
        }

        return $count;
    }

    function test()
    {
//        "l|*e*et|c**o|*de|" => 2
//        "iamprogrammer" => 0
//        "yo|uar|e**|b|e***au|tifu|l" => 5

        dd(
            $this->countAsterisks("l|*e*et|c**o|*de|"),
            $this->countAsterisks("iamprogrammer"),
            $this->countAsterisks("yo|uar|e**|b|e***au|tifu|l")
        );
    }
}