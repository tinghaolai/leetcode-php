<?php
class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $result = '';
        $carry = 0;
        $aLength = strlen($a);
        $bLength = strlen($b);
        for ($i = 1; $i <= $aLength || $i <= $bLength; $i++) {
            $currentVal = $carry;
            if ($i <= $aLength) {
                $currentVal += (int) $a[-$i];
            }

            if ($i <= $bLength) {
                $currentVal += (int) $b[-$i];
            }

            if ($currentVal >= 2) {
                $currentVal -= 2;
                $carry = 1;
            } else {
                $carry = 0;
            }

            $result = $currentVal . $result;
        }

        if ($carry) {
            return $carry . $result;
        }

        return $result;
    }
}