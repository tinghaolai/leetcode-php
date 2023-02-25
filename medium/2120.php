<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $startPos
     * @param String $s
     * @return Integer[]
     */
    function executeInstructions($n, $startPos, $s) {
        $result = [];
        $length = strlen($s);
        $currentLength = $length;
        for ($i = 0; $i < $length; $i++) {
            $count = 0;
            $currentI = $startPos[0];
            $currentJ = $startPos[1];
            for ($j = 0; $j < $currentLength; $j++) {
                switch ($s[$j]) {
                    case 'R':
                        $diffI = 0;
                        $diffJ = 1;
                        break;
                    case 'L':
                        $diffI = 0;
                        $diffJ = -1;
                        break;
                    case 'U':
                        $diffI = -1;
                        $diffJ = 0;
                        break;
                    case 'D':
                        $diffI = 1;
                        $diffJ = 0;
                        break;
                }

                $currentI += $diffI;
                $currentJ += $diffJ;
                foreach ([$currentI, $currentJ] as $val) {
                    if ($val < 0 || $val === $n) {
                        break 2;
                    }
                }

                $count++;
            }

            $result[] = $count;
            $s = substr($s, 1);
            $currentLength--;
        }

        return $result;
    }

    function test()
    {
        $result = $this->executeInstructions(
            3,
            [0,1],
            "RRDDLU"
        );

        dd($result);
    }
}