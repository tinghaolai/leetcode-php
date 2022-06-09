<?php

class Solution {

    protected $zeroMatrix;
    protected $iCount;
    protected $jCount;
    protected $matrixExists = [];
    /**
     * Runtime: 3368 ms, faster than 100.00% of PHP online submissions for Minimum Number of Flips to Convert Binary Matrix to Zero Matrix.
    Memory Usage: 20.5 MB, less than 100.00% of PHP online submissions for Minimum Number of Flips to Convert Binary Matrix to Zero Matrix.
     *
     * @param Integer[][] $mat
     * @return Integer
     */
    function minFlips($mat) {
        $this->zeroMatrix = str_replace('1', '0', json_encode($mat));
        $this->iCount = count($mat);
        $this->jCount = count($mat[0]);

        return $this->flip($mat, null, null, 0, true);
    }

    function flip($matrix, $i, $j, $step, $init = false)
    {
        if (!$init) {
            foreach ([
                [0, 0],
                [1, 0],
                [-1, 0],
                [0, 1],
                [0, -1],
            ] as $offSet) {
                $flipI = $i + $offSet[0];
                $flipJ = $j + $offSet[1];
                if (isset($matrix[$flipI][$flipJ])) {
                    $matrix[$flipI][$flipJ] = $matrix[$flipI][$flipJ] === 0 ? 1 : 0;
                }
            }
        }

        $matrixJson = json_encode($matrix);
        if ($matrixJson === $this->zeroMatrix) {
            return $step;
        }

        if (isset($this->matrixExists[$matrixJson]) && $this->matrixExists[$matrixJson] <= $step) {
            return -1;
        }

        $this->matrixExists[$matrixJson] = $step;
        $minStep = -1;
        for ($i = 0; $i < $this->iCount; $i++) {
            for ($j = 0; $j < $this->jCount; $j++) {
                $totalStep = $this->flip($matrix, $i, $j, $step + 1);
                if ($totalStep !== -1 && ($minStep === -1 || $totalStep < $minStep )) {
                    $minStep = $totalStep;
                }
            }
        }

        return $minStep;
    }

    function test()
    {
        dd(
            $this->minFlips([[0,0],[0,1]]),
            $this->minFlips([[0]]),
            $this->minFlips([[1,0,0],[1,0,0]])
        );
    }
}