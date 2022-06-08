<?php

class Solution {

    protected $scoreMapping = [];
    protected $length;
    protected $words;
    /**
     * Runtime: 64 ms, faster than 100.00% of PHP online submissions for Maximum Score Words Formed by Letters.
    Memory Usage: 19.2 MB, less than 100.00% of PHP online submissions for Maximum Score Words Formed by Letters
     *
     * @param String[] $words
     * @param String[] $letters
     * @param Integer[] $score
     * @return Integer
     */
    function maxScoreWords($words, $letters, $score) {
        $this->length = count($words);
        $this->words = $words;
        foreach ($score as $index => $value) {
            $this->scoreMapping[chr(97 + $index)] = $value;
        }

        $letterAvailable = array_count_values($letters);
        return max(
            $this->runWords(0, $letterAvailable, false),
            $this->runWords(0, $letterAvailable, true)
        );
    }

    function runWords($index, $letterAvailable, $ifSkip)
    {
        if ($index >= $this->length) {
            return 0;
        }

        $score = 0;
        if (!$ifSkip) {
            $originLetterAvailable = $letterAvailable;
            $valid = true;
            $word = $this->words[$index];
            for ($i = 0; $i < strlen($word); $i++) {
                if (isset($letterAvailable[$word[$i]]) && $letterAvailable[$word[$i]] !== 0) {
                    $letterAvailable[$word[$i]]--;
                    $score += $this->scoreMapping[$word[$i]];
                } else {
                    $valid = false;
                    break;
                }
            }

            if (!$valid) {
                $score = 0;
                $letterAvailable = $originLetterAvailable;
            }
        }

        return $score + max(
            $this->runWords($index + 1, $letterAvailable, false),
            $this->runWords($index + 1, $letterAvailable, true)
        );
    }

    function test()
    {
        dd(
            $this->maxScoreWords(
                ["dog","cat","dad","good"],
                ["a","a","c","d","d","d","g","o","o"],
                [1,0,9,5,0,0,3,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0]
            )
        );
    }
}