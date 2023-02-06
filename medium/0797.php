<?php

class Solution {

    /**
     * @param Integer[][] $graph
     * @return Integer[][]
     */
    function allPathsSourceTarget($graph) {
        $this->index = count($graph) - 1;
        $this->graph = $graph;
        $this->result = [];
        $this->runGraph(0, []);
        return $this->result;
    }

    function runGraph($index, $path)
    {
        $path[] = $index;
        if ($index === $this->index) {
            $this->result[] = $path;
            return;
        }

        if (empty($this->graph[$index])) {
            return;
        }

        foreach ($this->graph[$index] as $next) {
            $this->runGraph($next, $path);
        }
    }
}