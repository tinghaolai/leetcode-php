<?php

class Solution {

    /**
     * @param Integer[][] $score
     * @param Integer $k
     * @return Integer[][]
     */
    function sortTheStudents($score, $k) {
        $kRowNum = [];
        $scores = [];
        foreach ($score as $index => $student) {
            $studentScore = $student[$k];
            $kRowNum[$studentScore] = $index;
            $scores[] = $studentScore;
        }

        rsort($scores);

        $result = [];
        foreach ($scores as $studentScore) {
            $index = $kRowNum[$studentScore];
            $result[] = $score[$index];
        }

        return $result;
    }
}