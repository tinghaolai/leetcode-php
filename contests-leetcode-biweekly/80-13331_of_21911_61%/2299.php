<?php

class Solution {

    /**
     * @param String $password
     * @return Boolean
     */
    function strongPasswordCheckerII($password) {
        $wordCheck = 8;
        $hasInteger = false;
        $special = false;
        $hasLow = false;
        $hasUpper = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if ($i !== 0 && $password[$i] === $password[$i - 1]) {
                return false;
            }

            $wordCheck--;
            if (is_numeric($password[$i])) {
                $hasInteger = true;
                continue;
            }

            if (in_array($password[$i], ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '+'])) {
                $special = true;
                continue;
            }

            $ord = ord($password[$i]);
            if ($ord >= 97 && $ord <= 122) {
                $hasLow = true;
                continue;
            }

            if ($ord >= 65 && $ord <= 90) {
                $hasUpper = true;
                continue;
            }
        }

        return $wordCheck <= 0 && $hasInteger && $special && $hasLow && $hasUpper;
    }

    function test()
    {
        dd(
//            $this->strongPasswordCheckerII('IloveLe3tcode!'),
//            $this->strongPasswordCheckerII('Me+You--IsMyDream'),
//            $this->strongPasswordCheckerII('"0Aa!a!a!"'),
            $this->strongPasswordCheckerII('11A!A!Aa')
        );
    }
}