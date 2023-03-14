<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function vowelStrings($words, $left, $right) {
        $result = 0;
        $check = [
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
        for ($i = $left; $i <= $right; $i++) {
            $word = $words[$i];
            if (
                !empty($check[$word[0]]) &&
                !empty($check[$word[-1]])
            ) {
                $result++;
            }
        }

        return $result;
    }

    public function test()
    {
        $a = 'abc';
        dd($a[-1]);
    }
}