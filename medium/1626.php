<?php

class Solution {
    /**
     * @param Integer[] $scores
     * @param Integer[] $ages
     * @return Integer
     */

    function bestTeamScore($scores, $ages) {
        $members = [];
        foreach ($scores as $index => $score) {
            $age = $ages[$index];
            $members[] = [$age, $score];
        }

        sort($members);
        $maxValues = [];
        foreach ($members as $index => $member) {
            $member = $members[$index];
            $score = $member[1];
            $maxValues[$index] = $score;
            for ($j = 0; $j < $index; $j++) {
                $youngerMember = $members[$j];
                $youngerScore = $youngerMember[1];
                if ($score >= $youngerScore) {
                    $maxValues[$index] = max(
                        $maxValues[$index],
                        $maxValues[$j] + $score
                    );
                }
            }
        }

        return max($maxValues);
    }

    function bestTeamScore_1($scores, $ages) {
        $players = [];
        for ($i = 0; $i < count($scores); $i++) {
            $players[] = [$ages[$i], $scores[$i]];
        }
        sort($players);

        $dp = [];
        for ($i = 0; $i < count($players); $i++) {
            $dp[$i] = $players[$i][1];
            for ($j = 0; $j < $i; $j++) {
                if ($players[$j][1] <= $players[$i][1]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + $players[$i][1]);
                }
            }
        }

        dd($dp);
        return max($dp);
    }

    function test()
    {
        //Input: scores = [1,3,5,10,15], ages = [1,2,3,4,5]
//        scores = [4,5,6,5], ages = [2,1,2,1]
//        dd($this->bestTeamScore([1,3,5,10,15], [1,2,3,4,5]));
        dd($this->bestTeamScore([4,5,6,5], [2,1,2,1]));
        dd($this->bestTeamScore_1([4,5,6,5], [2,1,2,1]));
    }
}
