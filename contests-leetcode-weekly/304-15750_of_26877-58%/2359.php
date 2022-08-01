<?php

class Solution {

    /**
     * @param Integer[] $edges
     * @param Integer $node1
     * @param Integer $node2
     * @return Integer
     */
    function closestMeetingNode($edges, $node1, $node2) {
        $distance = 0;
        $node1Route = [$node1 => $distance];
        while (($next = $edges[$node1]) !== -1 && !array_key_exists($next, $node1Route)) {
            $distance++;
            $node1Route[$next] = $distance;
            $node1 = $next;
        }

        $distance = 0;
        $node2Route = [$node2 => $distance];
        while (($next = $edges[$node2]) !== -1 && !array_key_exists($next, $node2Route)) {
            $distance++;
            $node2Route[$next] = $distance;
            $node2 = $next;
        }

        $min = -1;
        $index = -1;
        foreach ($node1Route as $value => $distance) {
            if (array_key_exists($value, $node2Route)) {
                $distance = max($distance, $node2Route[$value]);
                if ($distance <= $min || $min === -1) {
                    if ($distance === $min) {
                        $index = min($index, $value);
                    } else {
                        $index = $value;
                    }
                    $min = $distance;
                }
            }
        }

        return $index;
    }

    function test()
    {
        dd(
//            $this->closestMeetingNode([2,2,3,-1], 0, 1),
//            $this->closestMeetingNode([5,4,5,4,3,6,-1], 0, 1),
//            $this->closestMeetingNode([4,4,8,-1,9,8,4,4,1,1], 5, 6),
            $this->closestMeetingNode([4,3,0,5,3,-1], 4, 0)

        );
    }
}