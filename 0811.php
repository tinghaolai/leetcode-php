<?php

class Solution {

    /**
     * Runtime: 38 ms, faster than 9.09% of PHP online submissions for Subdomain Visit Count.
    Memory Usage: 19.2 MB, less than 54.55% of PHP online submissions for Subdomain Visit Count.
     *
     * @param String[] $cpdomains
     * @return String[]
     */
    function subdomainVisits($cpdomains) {
        $counts = [];
        foreach ($cpdomains as $cpdomain) {
            $split    = explode(' ', $cpdomain);
            $offSet   = 0;
            $split[1] = '.' . $split[1];
            $strCount = strlen($split[1]);
            while (-$offSet <= $strCount) {
                $position = strrpos($split[1], '.', $offSet);
                $key = substr($split[1], $position + 1);
                if (!isset($counts[$key])) {
                    $counts[$key] = $split[0];
                } else {
                    $counts[$key] += $split[0];
                }

                $offSet = $position - $strCount - 1;
            }
        }

        $output = [];
        foreach ($counts as $domain => $count) {
            $output[] = $count . ' ' . $domain;
        }

        return $output;
    }
}
