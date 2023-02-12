<?php

class Solution {

    /**
     * @param Integer[][] $roads
     * @param Integer $seats
     * @return Integer
     */
    function minimumFuelCost($roads, $seats)
    {
        $roadInfos = [];
        foreach ($roads as $road) {
            foreach (
                [
                    [
                        'i' => 0,
                        'j' => 1,
                    ],
                    [
                        'i' => 1,
                        'j' => 0,
                    ]
                ] as $roadIndexes
            ) {
                $i = $road[$roadIndexes['i']];
                $j = $road[$roadIndexes['j']];
                if (empty($roadInfos[$i])) {
                    $roadInfos[$i] = [
                        'pathCount' => 0,
                        'originPathCount' => 0,
                        'nextIndexes' => [],
                    ];
                }

                $roadInfos[$i]['pathCount']++;
                $roadInfos[$i]['originPathCount']++;
                $roadInfos[$i]['nextIndexes'][$j] = true;
            }
        }

        $queueMapping = [];
        $queue = [];
        $queueCount = 0;
        $alreadyInCar = [];
        foreach ($roadInfos as $city => $roadInfo) {
            if ($roadInfo['pathCount'] === 1) {
                $queue[] = [
                    'city' => $city,
                    'seatLeft' => 0,
                    'carCount' => 0,
                    'literUsed' => 0,
                ];

//                $queueMapping[$city] = &$queue[$queueCount];
                $queueCount++;
            }
        }
        $liters = 0;

        while ($queueCount !== 0) {

            $rideInfo = array_shift($queue);

            $city = $rideInfo['city'];
//            echo 's - city: ' . $city . PHP_EOL;
            $queueCount--;
            if ($city === 0) {
                continue;
            }

            while ($city !== 0) {
//                echo 'city: ' . $city . PHP_EOL;
                if (!empty($queueMapping[$city])) {
//                    println('lt---' . $rideInfo['literUsed']);
                    $queueMapping[$city]['count']++;
//                    dd($queueMapping[$city]);
                    $existsQueue = $queueMapping[$city]['queue'];
//                    println($existsQueue);
//                    dd($existsQueue);
//                    dd($existsQueue, $city);
                    $carCount = $existsQueue['carCount'] + $rideInfo['carCount'];
                    $seatLeft = $existsQueue['seatLeft'] + $rideInfo['seatLeft'];
                    if ($seatLeft >= $seats) {
                        $carCount--;
                        $seatLeft -= $seats;
                    }

                    $existsQueue['seatLeft'] = $seatLeft;
                    $existsQueue['carCount'] = $carCount;
                    $existsQueue['literUsed'] = $existsQueue['literUsed'] + $rideInfo['literUsed'];

//                    println($existsQ7ueue);
                    $queueMapping[$city]['queue'] = $existsQueue;
                    $count = $queueMapping[$city]['count'];
                    $originCount = $roadInfos[$city]['originPathCount'];
                    if ($originCount - 2 === $count) {
                        $rideInfo = $existsQueue;
//                        println('gooo');
                    } else {
//                        println('skipped, count" ' . $queueMapping[$city]['count']);
                        continue 2;
                    }
                }
//                foreach ($queue as $qIndex => $existsQueue) {
//                    if ($existsQueue['city'] === $city) {
//                        $carCount = $existsQueue['carCount'] + $rideInfo['carCount'];
//                        $seatLeft = $existsQueue['seatLeft'] + $rideInfo['seatLeft'];
//                        if ($seatLeft >= $seats) {
//                            $carCount--;
//                            $seatLeft -= $seats;
//                        }
//
//                        $newRideInfo = [
//                            'city' => $city,
//                            'seatLeft' => $seatLeft,
//                            'carCount' => $carCount,
//                            'literUsed' => $existsQueue['literUsed'] + $rideInfo['literUsed'],
//                        ];
//
//                        $queue[$qIndex] = $newRideInfo;
//                        continue 3;
//                    }
//                }

//                echo 'city: ' . $city . PHP_EOL;

                if ($roadInfos[$city]['pathCount'] !== 1) {
                    $rideInfo['city'] = $city;
                    $queue[] = $rideInfo;
//                    if (empty($queueMapping[$city])) {
//                        $queueMapping[$city] = [
//                            'count' => 0,
//                        ];
//                    }

//                    $queueMapping[$city]['queue'] = &$queue[$queueCount];
//                    $queueMapping[$city]['count'] ++;

                    $queueMapping[$city] = [
                        'queue' => &$queue[$queueCount],
                        'count' => 0,
                    ];

//                    println('queue mapping store:' .$city);
                    $queueCount++;

//                    if ($t >= 10) {
//                        dd($roadInfos[$city]['pathCount'], $city);
//                    }

                    continue 2;
                }

                $prevCity = $city;
                foreach ($roadInfos[$prevCity]['nextIndexes'] as $index => $value) {
                    $city = $index;
                }

                if ($roadInfos[$city]['pathCount'] > 1) {
                    unset($roadInfos[$city]['nextIndexes'][$prevCity]);
                    $roadInfos[$city]['pathCount']--;
                }

                $rideInfo['literUsed'] += $rideInfo['carCount'];
                if (empty($alreadyInCar[$prevCity])) {
                    $alreadyInCar[$prevCity] = true;
                    if ($rideInfo['seatLeft'] === 0) {
                        $rideInfo['carCount']++;
                        $rideInfo['literUsed'] += 1;
                        $rideInfo['seatLeft'] = $seats - 1;
                    } else {
                        $rideInfo['seatLeft']--;
                    }
                }

            }

//                            echo 'city: ' . $city . PHP_EOL;

//            println('city: ' . $prevCity . '+ liter: ' . $rideInfo['literUsed']);
            $liters += $rideInfo['literUsed'];
        }

        return $liters;
    }

    function test()
    {
//     Input: roads = [[0,1],[0,2],[0,3]], seats = 5
//        Input: roads = [[3,1],[3,2],[1,0],[0,4],[0,5],[4,6]],
// seats = 2

//        $result =$this->minimumFuelCost(
////            [[3,1],[3,2],[1,0],[0,4],[0,5],[4,6]],
//
////            4
//[[0,1],[0,2],[1,3],[1,4]],
////            [[0,5]],
//            5
//        );


//        expect: 9
//        $result = $this->minimumFuelCost(
//            [[1,0],[0,2],[2,3],[0,4],[5,2],[6,4],[3,7],[7,8],[9,0]],
//    10
//
//        );


//        $result = $this->minimumFuelCost(
//[[0,1],[0,2],[1,3],[1,4]],
//5
//
//        );


//        expect: 8
                $result = $this->minimumFuelCost(
[[0,1],[0,2],[1,3],[3,4],[0,5],[6,3],[5,7],[3,8]],
        8

        );

        dd($result, '2477');
    }
}

