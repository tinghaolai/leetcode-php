<?php

class Solution {

    /**
     * Runtime: 30 ms, faster than 67.84% of PHP online submissions for Longest Substring Without Repeating Characters.
    Memory Usage: 19.2 MB, less than 79.11% of PHP online submissions for Longest Substring Without Repeating Characters.
     *
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $max = 0;
        $currentMax = 0;
        $current = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (array_key_exists($s[$i], $current)) {
                $max = max($max, $currentMax);
                $cleanIndex = $current[$s[$i]];
                while (
                    isset($s[$cleanIndex]) &&
                    array_key_exists($s[$cleanIndex], $current) &&
                    $current[$s[$cleanIndex]] === $cleanIndex
                ) {
                    unset($current[$s[$cleanIndex]]);
                    $cleanIndex--;
                    $currentMax--;
                }
            }

            $current[$s[$i]] = $i;
            $currentMax++;
        }

        return max($max, $currentMax);
    }

    function test()
    {
//        return $this->lengthOfLongestSubstring('dvdf'); // 3
//        return $this->lengthOfLongestSubstring('abcabcbb'); // 3
//        return $this->lengthOfLongestSubstring('tmmzuxt'); // 5
        return $this->lengthOfLongestSubstring('bpfbhmipx'); // 7
    }
}