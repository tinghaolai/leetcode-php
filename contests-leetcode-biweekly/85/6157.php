<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function secondsToRemoveOccurrences($s) {
        $result = -1;
        $haveOccur = true;
        $count = strlen($s);
        while ($haveOccur) {
            $result++;
            $haveOccur = false;
            $currentString = $s[0];
            for ($i = 1; $i < $count; $i++) {
                $currentString .= $s[$i];
                if ($currentString === '01') {
                    $haveOccur = true;
                    $s[$i] = '0';
                    $s[$i - 1] = '1';
                    if ($i + 1 === $count) {
                        continue 2;
                    }
                    $currentString = $s[$i + 1];
                    $i++;
                } else {
                    $currentString = $s[$i];
                }
            }
        }


        return $result;
    }

    function test()
    {
        dd($this->secondsToRemoveOccurrences('0110101'));
    }
}