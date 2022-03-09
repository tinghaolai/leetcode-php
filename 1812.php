<?php

class Solution {

    /**
     * Runtime: 4 ms, faster than 77.78% of PHP online submissions for Determine Color of a Chessboard Square.
    Memory Usage: 19.3 MB, less than 22.22% of PHP online submissions for Determine Color of a Chessboard Square.
     *
     * @param String $coordinates
     * @return Boolean
     */
    function squareIsWhite($coordinates) {
        return (ord($coordinates[0]) + (int) $coordinates[1]) % 2 === 1;
    }
}
