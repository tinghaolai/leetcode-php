<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $s1Count = [];
        $s2Count = [];
        $s1Length = strlen($s1);
        $s2Length = strlen($s2);
        for($i = 0; $i < $s1Length; $i++) {
            $this->addCount($s1Count, $s1[$i]);
            $this->addCount($s2Count, $s2[$i]);
        }

        if ($s1Count == $s2Count) {
            return true;
        }

        while ($i < $s2Length) {
            $lastChar = $s2[$i - $s1Length];
            $s2Count[$lastChar]--;
            if ($s2Count[$lastChar] === 0) {
                unset($s2Count[$lastChar]);
            }

            $this->addCount($s2Count, $s2[$i]);

            if ($s1Count == $s2Count) {
                return true;
            }
            $i++;
        }

        return false;
    }

        function addCount(array &$count, $char)
    {
        if (!isset($count[$char])) {
            $count[$char] = 1;
        } else {
            $count[$char]++;
        }
    }
}