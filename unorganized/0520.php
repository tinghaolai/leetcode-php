<?php

/**
 * Runtime: 8 ms, faster than 50.00% of PHP online submissions for Detect Capital.
Memory Usage: 15.7 MB, less than 50.00% of PHP online submissions for Detect Capital.
 *
 * Class Solution
 */

class Solution
{

    /**
     * @param String $word
     * @return Boolean
     */
    function detectCapitalUse($word)
    {
        if (!ctype_upper($word[0])) {
            foreach (str_split($word) as $char) {
                if (ctype_upper($char)) {
                    return false;
                }
            }
        } else {
            if (strlen($word) === 1) {
                return true;
            }

            if (ctype_upper($word[1])) {
                foreach (str_split($word) as $char) {
                    if (!ctype_upper($char)) {
                        return false;
                    }
                }
            } else {
                foreach (str_split(substr($word, 1)) as $char) {
                    if (ctype_upper($char)) {
                        return false;
                    }
                }
            }
        }

        return true;
    }


}
