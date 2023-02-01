<?php

class Solution {
//Runtime
//8 ms
//Beats
//25%
    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function gcdOfStrings($str1, $str2) {
        if (strlen($str1) < strlen($str2)) {
            $strShort = $str1;
            $strLong = $str2;
        } else {
            $strShort = $str2;
            $strLong = $str1;
        }

        $shortLength = strlen($strShort);
        $longLength = strlen($strLong);

        $div = $strShort;
        $length = $shortLength;
        for ($i = 0; $i < strlen($strShort); $i++) {
            if (
                $this->ifDiv($div, $length, $strShort, $shortLength) &&
                $this->ifDiv($div, $length, $strLong, $longLength)
            ) {
                return $div;
            }

            $div = substr($div, 0, $length - 1);
            $length--;
        }

        return '';
    }

    function ifDiv($div, $divLength, $target, $targetLength)
    {
        if ($divLength === 0 || $targetLength % $divLength !== 0) {
            return false;
        }

        $divIndex = 0;
        for ($i = 0; $i < $targetLength; $i++) {
            if ($div[$divIndex] !== $target[$i]) {
                return false;
            }

            $divIndex++;
            if ($divIndex === $divLength) {
                $divIndex = 0;
            }
        }

        if ($divIndex !== 0) {
            return false;
        }

        return true;
    }
}