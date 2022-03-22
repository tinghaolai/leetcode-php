<?php

class Solution {

    /**
     * Runtime: 4 ms, faster than 100.00% of PHP online submissions for Reformat Date.
    Memory Usage: 19.6 MB, less than 7.69% of PHP online submissions for Reformat Date.
     *
     * @param String $date
     * @return String
     */
    function reformatDate($date) {
        preg_match('/([0-9]+)([a-z]+)( )([A-Za-z]+)( )([0-9]+)/', $date, $matches);

        $monthMapping = [
            'Jan' => '01',
            'Feb' => '02',
            'Mar' => '03',
            'Apr' => '04',
            'May' => '05',
            'Jun' => '06',
            'Jul' => '07',
            'Aug' => '08',
            'Sep' => '09',
            'Oct' => '10',
            'Nov' => '11',
            'Dec' => '12',
        ];

        return $matches[6] . '-' . $monthMapping[$matches[4]] . '-' . ((strlen($matches[1]) === 2) ?
                $matches[1] : ('0' . $matches[1]));
    }
}
