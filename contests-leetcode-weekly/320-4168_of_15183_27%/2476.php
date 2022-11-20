<?php

class Solution {

    /**
     * @param TreeNode $root
     * @param Integer[] $queries
     * @return Integer[][]
     */
    function closestNodes($root, $queries) {
        $this->vals = [];
        $this->dfs($root);
        sort($this->vals);
        $valPosition = array_flip($this->vals);
        $count = count($this->vals);
        $max = max($this->vals);
        $min = min($this->vals);
        $answers = [];
        foreach ($queries as $query) {
            $result = $this->binaryCeilSearch($this->vals, $query, $count);
            if ($result === $query) {
                $answers[] = [$result, $result];
            } else if ($result === -1) {
                $answers[] = [$max, -1];
            } else if ($result === $min) {
                $answers[] = [-1, $min];
            } else {
                $answers[] = [$this->vals[$valPosition[$result] -1], $result];
            }
        }

        return $answers;
    }


    function dfs($node)
    {
        if (!$node) {
            return;
        }

        $this->vals[] = $node->val;
        $this->dfs($node->right);
        $this->dfs($node->left);
    }

    function binaryCeilSearch($array, $target, $count)
    {
        $start = 0;
        $end = $count - 1;
        if ($target > $array[$end]) {
            return -1;
        }

        if ($target < $array[$start]) {
            return $array[$start];
        }

        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($array[$middle] === $target) {
                return $target;
            }

            if ($array[$middle] < $target) {
                $start = $middle + 1;
            } else {
                $ceil = $array[$middle];
                $end = $middle - 1;
            }
        }

        return $ceil;
    }

    function test()
    {
        dd($this->closestNodes(null, [2,5,16]));
    }
}