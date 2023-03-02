<?php

class Solution {

    /**
     * @param String[] $chars
     * @return Integer
     */
    function compress(&$chars) {
        $newChars = [];
        $lastChar = $chars[0];
        $lastCharCount = 1;
        $length = count($chars);
        $result = 0;
        $char = '';
        $calChar = function () use (&$result, &$lastChar, &$lastCharCount, &$char, &$newChars) {
            $newChars[] = $lastChar;
            $result++;
            if ($lastCharCount > 1) {
                $result += (int) log($lastCharCount, 10) + 1;
                $newChars = array_merge(
                    $newChars,
                    str_split($lastCharCount)
                );
            }

            $lastCharCount = 1;
            $lastChar = $char;
        };

        for ($i = 1; $i < $length; $i++) {
            $char = $chars[$i];
            if ($char === $lastChar) {
                $lastCharCount++;
            } else {
                $calChar();
            }
        }

        $calChar();

        $chars = $newChars;
        return $result;
    }
}