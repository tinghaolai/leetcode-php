<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function addMinimum($word) {
        $loop = ['a', 'b', 'c'];
        $currentLoopIndex = 0;
        $length = strlen($word);
        $result = 0;
        $charIndexConvert = [
            'a' => 0,
            'b' => 1,
            'c' => 2,
        ];

        for ($i = 0; $i < $length; $i++) {
            $char = $word[$i];
            if ($char === $loop[$currentLoopIndex]) {
                $currentLoopIndex++;
                if ($currentLoopIndex === 3) {
                    $currentLoopIndex = 0;
                }

                continue;
            }

            $charIndex = $charIndexConvert[$char];
            if ($charIndex > $currentLoopIndex) {
                $result += $charIndex - $currentLoopIndex;
            } else {
                $result += 3 - $currentLoopIndex + $charIndex;
            }

            $currentLoopIndex = $charIndex + 1;
            if ($currentLoopIndex === 3) {
                $currentLoopIndex = 0;
            }
        }

        if ($currentLoopIndex !== 0) {
            $result += 3 - $currentLoopIndex;
        }

        return $result;
    }
}