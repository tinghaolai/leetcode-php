<?php

class Solution {

    /**
     * Runtime: 244 ms, faster than 100.00% of PHP online submissions for Replace Words.
    Memory Usage: 18.8 MB, less than 100.00% of PHP online submissions for Replace Words.
     *
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence)
    {
        $words = explode(' ', $sentence);
        $words = array_map(function ($word) use ($dictionary) {
            $count           = false;
            $currentPosition = false;
            $currentWord     = $word;
            foreach ($dictionary as $checkString) {
                if ((($position = strpos($word, $checkString)) !== false) &&
                    ($currentPosition === false || $position <= $currentPosition) &&
                    (($currentCount = strlen($checkString)) < $count ||
                        $count === false ||
                        $position <= $currentPosition) &&
                    (($position !== $currentPosition) || ($currentCount < $count))) {
                    $count           = $currentCount;
                    $currentWord     = $checkString;
                    $currentPosition = $position;
                }
            }

            if ($currentPosition !== 0) {
                return $word;
            }

            return $currentWord;
        }, $words);

        return implode(' ', $words);
    }

    /**
     *
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWordsBeforeRestructure($dictionary, $sentence)
    {
        $words = explode(' ', $sentence);
        $words = array_map(function ($word) use ($dictionary) {
            $count           = false;
            $currentPosition = false;
            $currentWord     = $word;
            foreach ($dictionary as $checkString) {
                if ((($position = strpos($word, $checkString)) !== false) &&
                    ($currentPosition === false || $position <= $currentPosition) &&
                    (($currentCount = strlen($checkString)) < $count ||
                        $count === false ||
                        $position <= $currentPosition)) {
                    if ($position === $currentPosition) {
                        if ($currentCount < $count) {

                            $count           = $currentCount;
                            $currentWord     = $checkString;
                            $currentPosition = $position;
                        }
                    } else {
                        $count           = $currentCount;
                        $currentWord     = $checkString;
                        $currentPosition = $position;
                    }

                }
            }


            if ($currentPosition !== 0) {
                return $word;
            }

            return $currentWord;
        }, $words);

        return implode(' ', $words);
    }
}
