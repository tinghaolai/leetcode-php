<?php

class Solution {

    /**
     * @param String $initialCurrency
     * @param String[][] $pairs1
     * @param Float[] $rates1
     * @param String[][] $pairs2
     * @param Float[] $rates2
     * @return Float
     */
    function maxAmount($initialCurrency, $pairs1, $rates1, $pairs2, $rates2) {
        $this->fc = $initialCurrency;
        $this->mapping1 = $this->covnertRateMapping($pairs1, $rates1);
        $this->mapping2 = $this->covnertRateMapping($pairs2, $rates2);
        $this->max = 1;
        $this->dfs($this->fc, 1, 1, []);

        return $this->max;
    }

    function dfs($c, $p, $day, $haveRun = [])
    {
        $haveRun[$c] = true;
        if ($c === $this->fc) {
            $this->max = max($this->max, $p);
        }

        if ($day === 1) {
            $mapping = $this->mapping1;
        } else {
            $mapping = $this->mapping2;
        }

        if (!empty($mapping[$c])) {
            foreach ($mapping[$c] as $nc => $rate) {
                if (!empty($haveRun[$nc])) {
                    continue;
                }

                $this->dfs($nc, $p * $rate, $day, $haveRun);
            }
        }

        if ($day === 1) {
            $this->dfs($c, $p, 2, []);
        }
    }

    function covnertRateMapping($pairs, $rates)
    {
        $mapping = [];
        foreach ($pairs as $i => $pair) {
            $from = $pair[0];
            $to = $pair[1];
            $mapping[$from][$to] = (float)$rates[$i];
            $mapping[$to][$from] = 1 / (float)$rates[$i];
        }

        return $mapping;
    }
}
