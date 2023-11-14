<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function countPalindromicSubsequence($s)
    {
        $result = 0;
        $charHaveRun = [];
        $length = strlen($s);
//      length or palindromic have to be 3
        for ($i = 0; $i < $length - 2; $i++) {
            $char = $s[$i];
            // skip if char have run
            if (isset($charHaveRun[$char])) {
                continue;
            }

            $charHaveRun[$char] = true;
            $nextChar = $s[$i + 1];
            $currentExist = [
                $nextChar => true,
            ];

            $currentCount = 1;
//          start with 3rd char, since 2 char can not form a palindromic
            for ($j = $i + 2; $j < $length; $j++) {
                $currentChar = $s[$j];
                if ($currentChar === $char) {
                    // add current count to result only when current char is same as first char,
                    // since we need to check last char has to be same as first char to form a palindromic
                    $result += $currentCount;
                    $currentCount = 0;
                }

                // skip if palindromic already exist
                if (isset($currentExist[$currentChar])) {
                    continue;
                }

                $currentExist[$currentChar] = true;
                $currentCount++;
            }
        }

        return $result;
    }
}