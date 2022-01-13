<?php

class Solution {

    /**
     * Runtime: 122 ms, faster than 25.00% of PHP online submissions for DI String Match.
    Memory Usage: 16.7 MB, less than 100.00% of PHP online submissions for DI String Match.
     *
     * @param String $s
     * @return Integer[]
     */
    function diStringMatch($s) {
        $output = [];
        for ($i = 0; $i <= strlen($s); $i++) {
            array_push($output, $i);
        }


        do {
            $currentResult = true;
            for ($i = 0; $i < strlen($s); $i++) {
                $valid = ($s[$i] === 'I') ?
                    ($output[$i] < $output[$i + 1]) :
                    ($output[$i] >  $output[$i + 1]);

                if (!$valid) {
                    $currentResult = false;
                    $temp = $output[$i];
                    $output[$i] = $output[$i+1];
                    $output[$i+1] = $temp;
                }

            }
        } while ($currentResult === false);


        return $output;
    }
}
