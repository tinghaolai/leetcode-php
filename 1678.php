<?php

class Solution {

    /**
     * Runtime: 17 ms, faster than 13.04% of PHP online submissions for Goal Parser Interpretation.
    Memory Usage: 19.4 MB, less than 28.26% of PHP online submissions for Goal Parser Interpretation.
     *
     * @param String $command
     * @return String
     */
    function interpret($command) {
        $output = $command[0];
        $lastIndex = 0;
        for ($i = 1; $i < strlen($command); $i++) {
            switch ($command[$i]) {
                case ')':
                    $output[$lastIndex] = 'o';
                    break;
                case 'a':
                    $output[$lastIndex] = 'a';
                    $output .= 'l';
                    $lastIndex++;
                    $i += 2;

                    break;
                default:
                    $output .= $command[$i];
                    $lastIndex++;
            }
        }

        return $output;
    }
}
