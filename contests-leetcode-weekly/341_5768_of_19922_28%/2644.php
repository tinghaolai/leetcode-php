<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $divisors
     * @return Integer
     */
    function maxDivScore($nums, $divisors) {
        $divisors = array_unique($divisors);
        $results = [];
        foreach ($divisors as $divisor) {
            $currentScore = 0;
            foreach ($nums as $num) {
                if ($num % $divisor === 0) {
                    $currentScore += 1;
                }
            }

            $results[] = [
                'score' => $currentScore,
                'divisor' => $divisor,
            ];
        }

        $maxScore = $results[0]['score'];
        $maxDivisor = $results[0]['divisor'];
        foreach ($results as $result) {
            if ($result['score'] > $maxScore) {
                $maxScore = $result['score'];
                $maxDivisor = $result['divisor'];
            } elseif ($result['score'] === $maxScore) {
                $maxDivisor = min($maxDivisor, $result['divisor']);
            }
        }

        return $maxDivisor;
    }
}