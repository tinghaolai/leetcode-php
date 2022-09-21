<?php

class Solution {

    /**
     * @param String $arriveAlice
     * @param String $leaveAlice
     * @param String $arriveBob
     * @param String $leaveBob
     * @return Integer
     */
    function countDaysTogether($arriveAlice, $leaveAlice, $arriveBob, $leaveBob) {
        $start = $arriveAlice > $arriveBob ? $arriveAlice : $arriveBob;
        $end = $leaveAlice < $leaveBob ? $leaveAlice : $leaveBob;

        if ($start > $end) {
            return 0;
        }

        $start = date_create_from_format('m-d', $start);
        $end = date_create_from_format('m-d', $end);

        return $start->diff($end)->days + 1;
    }

    function test()
    {
        dd(
            $this->countDaysTogether(
                '08-15',
                '08-18',
                '08-16',
                '08-19'
            )
        );
    }
}