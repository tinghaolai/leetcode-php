<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function sortVowels($s) {
        $vowels = [
            'a' => true,
            'e' => true,
            'i' => true,
            'o' => true,
            'u' => true,
            'A' => true,
            'E' => true,
            'I' => true,
            'O' => true,
            'U' => true,
        ];

        $sortVowels = [];
        $l = strlen($s);
        for ($i = 0; $i < $l; $i++) {
            $char = $s[$i];
            if (isset($vowels[$char])) {
                $sortVowels[] = $char;
            }
        }

        sort($sortVowels);
        $result = '';
        $sortVowelsIndex = 0;
        for ($i = 0; $i < $l; $i++) {
            $char = $s[$i];
            if (isset($vowels[$char])) {
                $result .= $sortVowels[$sortVowelsIndex];
                $sortVowelsIndex++;
            } else {
                $result .= $char;
            }
        }

        return $result;
    }
}