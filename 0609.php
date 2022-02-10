<?php

class Solution {

    /**
     * Runtime: 51 ms, faster than 100.00% of PHP online submissions for Find Duplicate File in System.
    Memory Usage: 33.6 MB, less than 100.00% of PHP online submissions for Find Duplicate File in System.
     *
     * @param String[] $paths
     * @return String[][]
     */
    function findDuplicate($paths) {
        $contentPath = [];
        foreach ($paths as $path) {
            $infos = explode(' ', $path);
            for ($i = 1; $i < count($infos); $i++) {
                preg_match('/(.*)(\()(.*)(\))/', $infos[$i], $matches, PREG_OFFSET_CAPTURE);

                $content = $matches[3][0];
                if (!isset($contentPath[$content])) {
                    $contentPath[$content] = [];
                }

                $contentPath[$content][] = $infos[0] . '/' . $matches[1][0];
            }
        }

        return array_values(array_filter($contentPath, function ($output) {
            return count($output) > 1;
        }));
    }
}
