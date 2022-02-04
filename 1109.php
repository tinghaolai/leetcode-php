<?php

class Solution {

    /**
     * Runtime: 348 ms, faster than 100.00% of PHP online submissions for Corporate Flight Bookings.
    Memory Usage: 47.2 MB, less than 100.00% of PHP online submissions for Corporate Flight Bookings.
     *
     * @param Integer[][] $bookings
     * @param Integer $n
     * @return Integer[]
     */
    function corpFlightBookings($bookings, $n) {
        $output = array_fill(0, $n, 0);
        foreach ($bookings as $booking) {
            $output[$booking[0] - 1] += $booking[2];
            if (array_key_exists($booking[1], $output)) {
                $output[$booking[1]] -= $booking[2];
            }
        }

        for($i = 1; $i < $n; $i++) {
            $output[$i] += $output[$i - 1];
        }

        return $output;
    }
}
