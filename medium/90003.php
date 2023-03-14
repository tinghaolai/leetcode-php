<?php
//echo 6463334891 ^ 1000212390;

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function beautifulSubarrays_tle($nums) {
        $result = 0;
        $count = count($nums);
        foreach ($nums as $i => $num) {
            $current = $num;
            if ($current === 0) {
                $result++;
            }

            for ($j = $i + 1; $j < $count; $j++) {
                $current ^= $nums[$j];
                if ($current == 0) {
                    $result++;
                }
            }
        }

        return $result;
    }

    function beautifulSubarrays($nums) {
        if (array_sum($nums) === 0) {
            $length = count($nums);
            $result = 1;
            $i = $length;
            while ($i > 1) {
                $result += $i;
                $i--;
            }

            return $result;
        }


        $length = count($nums);
        $midIndex = (int) ($length / 2);
        $mid = $nums[$midIndex];
        $leftArray = array_slice($nums, 0, $midIndex);
        $rightArray = array_slice($nums, $midIndex + 1);
        $left = [
            'sum' => array_sum($leftArray),
            'vals' => $leftArray,
            'count' => count($leftArray),
        ];

        $right = [
            'sum' => array_sum($rightArray),
            'vals' => $rightArray,
            'count' => count($rightArray),
        ];

        if ($left['sum'] <= $right['sum'] && $right['count'] !== 0) {
            $left['sum'] += $mid;
            $left['count'] ++;
            $left['vals'][] = $mid;
        } else {
            $right['sum'] += $mid;
            $right['count'] ++;
            array_unshift($right['vals'], $mid);
        }

        $result = 0;
        if (
            $left['sum'] === $right['sum'] &&
            $left['count'] &&
            $right['count']
        ) {
            $result++;
        }

        while ($left['count'] && $right['count']) {
            if (
                $left['sum'] === 0 &&
                $right['sum'] ===0 &&
                ($left['count'] > 1 || $right['count'] > 1)
            ) {
                $length = $left['count'] + $right['count'];
                $resultB = 1;
                $i = $length;
                while ($i > 1) {
                    $resultB += $i;
                    $i--;
                }

                return $result + $resultB;
            }

            if ($left['sum'] >= $right['sum']) {
                $remove = array_pop($left['vals']);
                $left['sum'] -= $remove;
                $left['count'] --;
            } else {
                $remove = array_shift($right['vals']);
                $right['sum'] -= $remove;
                $right['count'] --;
            }

            if (
                $left['sum'] === $right['sum'] &&
                $left['count'] &&
                $right['count']
            ) {
                $result++;
            }
        }

        if (
            $left['sum'] === 0 &&
            $right['sum'] === 0
        ) {
            $length = $left['count'] + $right['count'];
            $resultB = 1;
            $i = $length;
            while ($i > 1) {
                $resultB += $i;
                $i--;
            }
            return $result + $resultB;
        }

        foreach ($nums as $num) {
            if ($num === 0) {
                $result++;
            }
        }

        return $result;
    }

    function test()
    {
        dd(
//            $this->beautifulSubarrays([4,3,1,2,4]),

            $this->beautifulSubarrays([0,1,0]),
            'expect: 2',
            $this->beautifulSubarrays([1,0,0]),
            'expect:3',
            $this->beautifulSubarrays([0,0,0]),
            'expect: 6',
            $this->beautifulSubarrays([0,0]),
            'expect: 3',
            $this->beautifulSubarrays([0]),
            'expect: 1',

//            $this->beautifulSubarrays([1,10,4]),
        );
    }
}