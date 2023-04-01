<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */

    function findShortestCycle($n, $edges) {
        $this->path = [];
        $nExist = [];
        foreach ($edges as $edge) {
            if (empty($this->path[$edge[0]])) {
                $this->path[$edge[0]] = [];
            }

            if (empty($this->path[$edge[1]])) {
                $this->path[$edge[1]] = [];
            }

            $this->path[$edge[0]][] = $edge[1];
            $this->path[$edge[1]][] = $edge[0];
            $nExist[$edge[0]] = true;
            $nExist[$edge[1]] = true;
        }

        $this->result = -1;
        $this->runned = [];
        foreach ($nExist as $index => $exist) {
            $this->loopIndex = [];
            $this->run($index, 1);
        }

        return $this->result;
    }

    function run($index, $depth, $prev = [], $prevI = null, $inValidPath = []) {
        if (!empty($this->runned[$index]) && $this->runned[$index] >= 2) {
            return;
        }

        if (!empty($prev[$index])) {
            $result = $depth - $prev[$index];
            if ($result < 0) {
                return;
            }

            if ($this->result === -1) {
                $this->result = $result;
            } else if ($result > 0) {
                $this->result = min(
                    $this->result,
                    $result
                );
            }

            return;
        }

        $prev[$index] = $depth;
        $this->runned[$index] = isset($this->runned[$index]) ? $this->runned[$index] + 1 : 1;
        foreach ($this->path[$index] as $next) {
            if (!empty($inValidPath[$index . '-' . $next])) {
                continue;
            }

            $inValidPath[$next . '-' . $index] = true;
            $this->run($next, $depth + 1, $prev, $index, $inValidPath);
        }
    }

}