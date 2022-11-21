<?php

class Solution {


    /**
     * @param Integer[][] $roads
     * @param Integer $seats
     * @return Integer
     */
    function minimumFuelCost($roads, $seats) {
        $length = count($roads);
        $counts = [0];
        for ($i = 1; $i <= $length; $i++) {
            $counts[$i] = 2;
        }

        $leafs = [];
        $pathCache = [];
        foreach ($roads as $cityPath) {
            $counts[$cityPath[0]]--;
            $counts[$cityPath[1]]--;
            foreach ([0, 1] as $i) {
                $j = $i === 0 ? 1 : 0;
                if (!isset($pathCache[$cityPath[$i]])) {
                    $pathCache[$cityPath[$i]] = [$cityPath[$j]];
                } else {
                    $pathCache[$cityPath[$i]][] = $cityPath[$j];
                }
            }
        }

        foreach ($counts as $index => $count) {
            if ($count === 1) {
                $leafs[] = $index;
            }
        }

        $result = 0;
        $seatLeft = [];
        $cityHaveRun = [];
        foreach ($leafs as $leaf) {
            $currentCount = 0;
            $currentRun = [];
            while($leaf) {
                if ($leaf === 0) {
                    break;
                }

                $currentRun[$leaf] = true;
                if (!isset($cityHaveRun[$leaf])) {
                    $currentCount++;
                    $cityHaveRun[$leaf] = true;
                }

                if (isset($seatLeft[$leaf])) {
                    $min = min($seatLeft[$leaf], $currentCount);
//                    $currentCount -= $min;
                    $calCount = $currentCount - $min;
                    $seatLeft[$leaf] -= $min;
                    if (!$seatLeft[$leaf]) {
                        unset($seatLeft[$leaf]);
                    }
                } else {
                    $calCount = $currentCount;
                }

//                $fuel = ceil($currentCount / $seats);
                $fuel = ceil($calCount / $seats);
                $result += $fuel;
                $currentSeatLeft = $fuel * $seats - $calCount;
                if ($currentSeatLeft) {
                    if (!isset($seatLeft[$leaf])) {
                        $seatLeft[$leaf] = 0;
                    }

                    $seatLeft[$leaf] += $currentSeatLeft;
                }

                $nextCityIndex = -1;
                do {
                    $nextCityIndex++;
                } while (isset($currentRun[$pathCache[$leaf][$nextCityIndex]]));

                $leaf = $pathCache[$leaf][$nextCityIndex];
            }
        }

        return $result;
    }

    function test()
    {
        dd(
//            $this->minimumFuelCost([[3,1],[3,2],[1,0],[0,4],[0,5],[4,6]], 2),
//            $this->minimumFuelCost([], 1),
//            $this->minimumFuelCost([[0,1],[0,2],[1,3],[1,4]], 5),
//            $this->minimumFuelCost([[0,1],[1,2]], 3),
//            $this->minimumFuelCost([[3,1],[3,2],[1,0],[0,4],[0,5],[4,6]], 2), //7
//            $this->minimumFuelCost([[1,0],[0,2],[3,1],[1,4],[5,0]], 1),
            $this->minimumFuelCost([[0,1],[2,1],[3,2],[4,2],[4,5],[6,0],[5,7],[8,4],[9,2]], 2),  // 16
//            $this->minimumFuelCost([[1,0],[0,2],[2,3],[0,4],[5,2],[6,4],[3,7],[7,8],[9,0]], 10),
        );
    }
}