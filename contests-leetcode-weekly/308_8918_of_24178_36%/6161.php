<?php

class Solution {
    /**
     * @param String $s
     * @return String
     */
    function removeStars($s) {
        $nonStarStack = [];
        $nonStarStackIndex = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] !== '*') {
                $nonStarStack[$nonStarStackIndex] = $i;
                $nonStarStackIndex++;
            } else {
                if ($nonStarStackIndex >= 1) {
                    $nonStarStackIndex--;
                    $s[$nonStarStack[$nonStarStackIndex]] = '-';
                }
            }
        }

        $newS = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] !== '*' && $s[$i] !== '-') {
                $newS .= $s[$i];
            }
        }

        return $newS;
    }


    /**
     * @param String $s
     * @return String
     */
    function removeStars_time_limit_exceed_2($s) {
        $lastStar = false;
        $lastRemoved = false;
        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$i] === '*') {
                if ($i - 1 === $lastStar) {
                    $j = $lastRemoved - 1;
                } else {
                    $j = $i - 1;
                }

                if (!isset($s[$j])) {
                    continue;
                }

                while ($s[$j] === '*' || $s[$j] === '-') {
                    $j--;
                    if (!isset($s[$j])) {
                        continue 2;
                    }
                }

                $s[$j] = '-';
                $lastRemoved = $j;
                $lastStar = $i;
            }
        }

        $newS = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] !== '*' && $s[$i] !== '-') {
                $newS .= $s[$i];
            }
        }

        return $newS;
    }

    /**
     * @param String $s
     * @return String
     */
    function removeStars_time_limit_exceed($s) {
        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$i] === '*') {
                $j = $i - 1;
                if (!isset($s[$j])) {
                    continue;
                }

                while ($s[$j] === '*' || $s[$j] === '-') {
                    $j--;
                    if (!isset($s[$j])) {
                        continue 2;
                    }
                }

                $s[$j] = '-';
            }
        }

        $newS = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] !== '*' && $s[$i] !== '-') {
                $newS .= $s[$i];
            }
        }

        return $newS;
    }

    function test()
    {
        dd(
            $this->removeStars('leet**cod*e'),
            $this->removeStars('erase*****')
        );
    }
}