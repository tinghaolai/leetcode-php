<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $redEdges
     * @param Integer[][] $blueEdges
     * @return Integer[]
     */
    function shortestAlternatingPaths($n, $redEdges, $blueEdges) {
        $edges = [];
        foreach ([['base' => 1, 'edges' => $redEdges], ['base' => -1, 'edges' => $blueEdges]] as $edgeSetting) {
            foreach ($edgeSetting['edges'] as $edge) {
                if (empty($edges[$edgeSetting['base']][$edge[0]])) {
                    $edges[$edgeSetting['base']][$edge[0]] = [];
                }

                $edges[$edgeSetting['base']][$edge[0]][] = $edge[1];
            }
        }

        $haveToRuns = [];
        $haveToRuns[] = [
            'base'  => 1,
            'count' => 0,
            'index' => 0,
        ];

        $haveToRuns[] = [
            'base'  => -1,
            'count' => 0,
            'index' => 0,
        ];

        $found = [];
        $alreadyRun = [];
        while(!empty($haveToRuns)) {
            $run = array_shift($haveToRuns);
            $base = $run['base'];
            $count = $run['count'];
            $index = $run['index'];
            if (!empty($alreadyRun[$base][$index])) {
                continue;
            }

            $alreadyRun[$base][$index] = true;
            if (!array_key_exists($index, $found)) {
                $found[$index] = $count;
            }

            if (empty($edges[$base][$index])) {
                continue;
            }

            foreach ($edges[$base][$index] as $nextIndex) {
                $haveToRuns[] = [
                    'base'  => $base * -1,
                    'count' => $count + 1,
                    'index' => $nextIndex,
                ];
            }
         }

        for ($i = 0; $i < $n; $i++) {
            if (!array_key_exists($i, $found)) {
                $found[$i] = -1;
            }
        }

        $result = [];
        for ($i = 0; $i < $n; $i++) {
            if (array_key_exists($i, $found)) {
                $result[] = $found[$i];
            } else {
                $result[] = -1;
            }
        }

        return $result;
    }

    function test()
    {
//        [0,2,-1,1,2]
        $result = $this->shortestAlternatingPaths(5, [[1,4],[0,3]], [[3,1],[3,4]]);

        dd($result);
    }
}