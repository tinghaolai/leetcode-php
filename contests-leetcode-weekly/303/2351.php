<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function repeatedCharacter($s) {
        $repeat = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (!empty($repeat[$s[$i]])) {
                return $s[$i];
            }

            $repeat[$s[$i]] = true;
        }
    }

    function test()
    {
        dd(
            $this->repeatedCharacter('abccbaacz')
        );
    }
}