<?php

class Solution {

    /**
    Runtime: 13 ms, faster than 10.00% of PHP online submissions for Long Pressed Name.
    Memory Usage: 15.6 MB, less than 100.00% of PHP online submissions for Long Pressed Name.
     *
     * @param String $name
     * @param String $typed
     * @return Boolean
     */
    function isLongPressedName($name, $typed) {
        function isLongPressedName($name, $typed) {
            $currentIndex = 0;
            for ($i = 0; $i < strlen($typed); $i++) {

                if ($typed[$i] === $name[$currentIndex]) {
                    if ($currentIndex < strlen($name) - 1) {
                        $currentIndex++;
                    }

                    continue;
                }

                if ($currentIndex === 0) {
                    return false;
                }

//                這邊用 or 的方式去寫，行數變少但速度變慢
                if ($name[$currentIndex -1] === $typed[$i] && $typed[$i] === $typed[$i - 1]) {
                    continue;
                } else {
                    return false;
                }
            }

            return $currentIndex === strlen($name) - 1 && $typed[-1] === $name[-1];
        }
    }
}
