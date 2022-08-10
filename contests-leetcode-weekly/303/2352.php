<?php

class Solution {

    /**
     * Runtime: 225 ms
    Memory Usage: 25.1 MB
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    function equalPairs($grid) {
        $rows = [];
        foreach ($grid as $row) {
            $key = implode('-', $row);
            $rows[$key] = empty($rows[$key]) ? 1 : $rows[$key] + 1;
        }

        $rowCount = count($grid);
        $count = 0;
        for ($i = 0; $i < count($grid[0]); $i++) {
            $value = [];
            for ($j = 0; $j < $rowCount; $j++) {
                $value[] = $grid[$j][$i];
            }

            $value = implode('-', $value);
            if (isset($rows[$value])) {
                $count += $rows[$value];
            }
        }

        return $count;
    }

    function test() {
        dd(
            $this->equalPairs(
                [[3,2,1],[1,7,6],[2,7,7]]
            ),
            $this->equalPairs(
                [[3,1,2,2],[1,4,4,5],[2,4,2,2],[2,4,2,2]]
            ),
            $this->equalPairs(
                [[11,1],[1,11]]
            )
        );
    }
}