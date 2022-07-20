<?php

class Solution {

// 假設最後出的 group 數量是 4,3,2
// 計算無法連線數量為 (4*3 + 4*2) + (3*2)
// 在 *2 的部分是一樣的，因此可以一同計算 = (4+3) * 2
// 每往後推進一次，就補上當前的數量，在下次計算不能連線的數量時，即可一併計算
// 這樣複雜的就不會是 n^2，而是 n

    /**
     *Runtime: 1519 ms
    Memory Usage: 181.4 MB
     *
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countPairs($n, $edges) {
        $currentGroupIndex = 1;
        $groups = [];
        $nodeGroup = [];
        foreach ($edges as $edge) {
            if (!isset($nodeGroup[$edge[0]]) && !isset($nodeGroup[$edge[1]])) {
                $groups[$currentGroupIndex] = [$edge[0], $edge[1]];
                $nodeGroup[$edge[0]] = $currentGroupIndex;
                $nodeGroup[$edge[1]] = $currentGroupIndex;
                $currentGroupIndex++;
            } else if (isset($nodeGroup[$edge[0]]) && isset($nodeGroup[$edge[1]])) {
                if ($nodeGroup[$edge[0]] !== $nodeGroup[$edge[1]]) {
                    $oriGroupIndex = $nodeGroup[$edge[0]];
                    foreach ($groups[$oriGroupIndex] as $node) {
                        $nodeGroup[$node] = $nodeGroup[$edge[1]];
                        $groups[$nodeGroup[$edge[1]]][] = $node;
                    }

                    unset($groups[$oriGroupIndex]);
                }
            } else if (isset($nodeGroup[$edge[0]])) {
                $groupIndex = $nodeGroup[$edge[0]];
                $groups[$groupIndex][] = $edge[1];
                $nodeGroup[$edge[1]] = $groupIndex;
            } else {
                $groupIndex = $nodeGroup[$edge[1]];
                $groups[$groupIndex][] = $edge[0];
                $nodeGroup[$edge[0]] = $groupIndex;
            }
        }

        $groupCount = [];
        foreach ($groups as $group) {
            $count = count($group);
            $groupCount[] = $count;
            $n -= $count;
        }

        while ($n > 0) {
            $groupCount[] = 1;
            $n--;
        }

        $sum = 0;
        $groupLength = count($groupCount);

        $base = $groupCount[0];
        for ($i = 1; $i < $groupLength; $i++) {
            $sum += $base * $groupCount[$i];
            $base += $groupCount[$i];
        }

        return $sum;
    }

    /**
     *  Time Limit Exceeded
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countPairs_time_limit_exceed($n, $edges) {
        $currentGroupIndex = 1;
        $groups = [];
        $nodeGroup = [];
        foreach ($edges as $edge) {
            if (!isset($nodeGroup[$edge[0]]) && !isset($nodeGroup[$edge[1]])) {
                $groups[$currentGroupIndex] = [$edge[0], $edge[1]];
                $nodeGroup[$edge[0]] = $currentGroupIndex;
                $nodeGroup[$edge[1]] = $currentGroupIndex;
                $currentGroupIndex++;
            } else if (isset($nodeGroup[$edge[0]]) && isset($nodeGroup[$edge[1]])) {
                if ($nodeGroup[$edge[0]] !== $nodeGroup[$edge[1]]) {
                    $oriGroupIndex = $nodeGroup[$edge[0]];
                    foreach ($groups[$oriGroupIndex] as $node) {
                        $nodeGroup[$node] = $nodeGroup[$edge[1]];
                        $groups[$nodeGroup[$edge[1]]][] = $node;
                    }

                    unset($groups[$oriGroupIndex]);
                }
            } else if (isset($nodeGroup[$edge[0]])) {
                $groupIndex = $nodeGroup[$edge[0]];
                $groups[$groupIndex][] = $edge[1];
                $nodeGroup[$edge[1]] = $groupIndex;
            } else {
                $groupIndex = $nodeGroup[$edge[1]];
                $groups[$groupIndex][] = $edge[0];
                $nodeGroup[$edge[0]] = $groupIndex;
            }
        }

        $groupCount = [];
        foreach ($groups as $group) {
            $count = count($group);
            $groupCount[] = $count;
            $n -= $count;
        }

        while ($n > 0) {
            $groupCount[] = 1;
            $n--;
        }

        $sum = 0;
        $groupLength = count($groupCount);
        foreach ($groupCount as $index => $count) {
            for ($i = $index + 1; $i < $groupLength; $i++) {
                $sum += $count * $groupCount[$i];
            }
        }

        return $sum;
    }

    function test()
    {
        dd(
            $this->countPairs(7, [[0,2],[0,5],[2,4],[1,6],[5,4]]),
            $this->countPairs(3, [[0,1],[0,2],[1,2]])
        );
    }
}