<?php

class Solution {
    /**
     * @param String[] $words
     * @param String $order
     * @return Boolean
     */
     function isAlienSorted($words, $order) {
        $orderValMapping = array_flip(str_split($order));
        $wordLength = count($words);
        for ($i = 0;  $i < $wordLength - 1; $i++) {
            $word = $words[$i];
            for ($currentCharIndex = 0; $currentCharIndex < strlen($word); $currentCharIndex++) {
                $char = $word[$currentCharIndex];
                $currentVal = $orderValMapping[$char];
                $largerWord = $words[$i + 1];
                if (empty($largerWord[$currentCharIndex])) {
                    return false;
                }

                $largerChar = $largerWord[$currentCharIndex];
                $largerVal = $orderValMapping[$largerChar];
                if ($largerVal < $currentVal ) {
                    return false;
                } elseif ($largerVal > $currentVal) {
                    continue 2;
                }
            }
        }

        return true;
    }
}
