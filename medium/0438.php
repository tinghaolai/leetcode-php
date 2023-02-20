<?php

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p) {
        $pLength = strlen($p);
        $pCount = [];
        $currentCount = [];
        for ($i = 0; $i < $pLength; $i++) {
            if (empty($pCount[$p[$i]])) {
                $pCount[$p[$i]] = 1;
            } else {
                $pCount[$p[$i]]++;
            }

            if (!empty($s[$i])) {
                if (empty($currentCount[$s[$i]])) {
                    $currentCount[$s[$i]] = 1;
                } else {
                    $currentCount[$s[$i]]++;
                }
            }
        }

        $i = $pLength;
        $sLength = strlen($s);
        $result = [];
        if ($currentCount == $pCount) {
            $result[] = 0;
        }

        while ($i < $sLength) {
            if (empty($currentCount[$s[$i]])) {
                $currentCount[$s[$i]] = 1;
            } else {
                $currentCount[$s[$i]]++;
            }

            $last = $i - $pLength;
            $currentCount[$s[$last]]--;
            if (!$currentCount[$s[$last]]) {
                unset($currentCount[$s[$last]]);
            }

            if ($currentCount == $pCount) {
                $result[] = $i - $pLength + 1;
            }

            $i++;
        }

        return $result;
    }

    function test() {
        $result = $this->findAnagrams('cbaebabacd', 'abc');
        dd($result);
    }
}