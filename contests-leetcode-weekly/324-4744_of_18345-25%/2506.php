<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function smallestValue($n) {
        if ($n <= 2) {
            return $n;
        }

        $this->result = 0;
        $this->divSum = $n;
        do {
            $n = $this->divSum;
            $this->divSum = 0;
            $this->runCount = 0;
            $this->runN($n);

        } while ($this->runCount > 1);

        return $n;
    }

    function runN($n)
    {
        if ($n === 2 && $this->divSum === 2) {
            return;
        }

        $this->runCount++;
        $div = 2;
        while ($n % $div !== 0) {
            $div++;
        }

        $this->divSum += $div;
        if ($n === $div) {
            return;
        }

        $n = $n / $div;
        $this->runN($n);
    }

    function test() {
        dd(
//            5
            $this->smallestValue(15),
//            4
            $this->smallestValue(4),
        );
    }
}