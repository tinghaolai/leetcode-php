<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums) {
        return $this->sort($nums, count($nums));
    }

    function sort($array, $length)
    {
        if ($length <= 1) {
            return $array;
        }

        $middle = (int) ($length / 2);

        $aLength = $middle;
        $bLength = $length - $middle;
        $subArrayA = $this->sort(array_slice($array, 0, $middle), $aLength);
        $subArrayB = $this->sort(array_slice($array, $middle), $bLength);
        $merge = [];
        $aIndex = 0;
        $bIndex = 0;

        while ($aLength && $bLength) {
            if ($subArrayA[$aIndex] < $subArrayB[$bIndex]) {
                $merge[] = $subArrayA[$aIndex];
                $aLength--;
                $aIndex++;
            } else {
                $merge[] = $subArrayB[$bIndex];
                $bLength--;
                $bIndex++;
            }
        }

        if ($aLength) {
            $merge = array_merge($merge, array_splice($subArrayA, $aIndex));
        }

        if ($bLength) {
            $merge = array_merge($merge, array_splice($subArrayB, $bIndex));
        }

        return $merge;
    }

    function test() {
        dd($this->sortArray([5,3,1,4,9,6,7]));
    }
}