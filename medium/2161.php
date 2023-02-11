<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $pivot
     * @return Integer[]
     */
    function pivotArray($nums, $pivot) {
        $smaller = [];
        $equal = [];
        $bigger = [];
        foreach ($nums as $num) {
            if ($num === $pivot) {
                $equal[] = $num;
            } elseif ($num > $pivot) {
                $bigger[] = $num;
            } else {
                $smaller[] = $num;
            }
        }

        return array_merge(
            $smaller,
            $equal,
            $bigger
        );
    }
}