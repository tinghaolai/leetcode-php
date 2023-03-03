<?php

class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        $length = strlen($needle);
        $current = substr($haystack, 0, $length);
        if ($current === $needle) {
            return 0;
        }

        $loopLength = strlen($haystack);
        for ($i = $length; $i < $loopLength; $i++) {
            $current = substr($current, 1) . $haystack[$i];
            if ($current === $needle) {
                return $i - $length + 1;
            }
        }

        return -1;
    }
}