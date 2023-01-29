<?php

class Solution {

    /**
     * @param String[] $words
     * @param String $pattern
     * @return String[]
     */
    function findAndReplacePattern($words, $pattern) {
        $output = [];
        foreach ($words as $word) {
            $mapping = [];
            for ($i = 0; $i < strlen($pattern); $i ++) {
                if (!isset($mapping[$pattern[$i]])) {
                    $mapping[$pattern[$i]] = $word[$i];
                } else if ($mapping[$pattern[$i]] !== $word[$i]) {
                    continue 2;
                }
            }

            if (count($mapping) === count(array_unique($mapping))) {
                $output[] = $word;
            }
        }

        return $output;
    }
}
