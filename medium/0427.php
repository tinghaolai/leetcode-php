<?php

/**
 * Definition for a QuadTree node.
 * class Node {
 *     public $val = null;
 *     public $isLeaf = null;
 *     public $topLeft = null;
 *     public $topRight = null;
 *     public $bottomLeft = null;
 *     public $bottomRight = null;
 *     function __construct($val, $isLeaf) {
 *         $this->val = $val;
 *         $this->isLeaf = $isLeaf;
 *         $this->topLeft = null;
 *         $this->topRight = null;
 *         $this->bottomLeft = null;
 *         $this->bottomRight = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Integer[][] $grid
     * @return Node
     */
    function construct($grid) {
        $this->grid = $grid;
        return $this->runNode(0, 0, count($grid));
    }

    function runNode($i, $j, $size)
    {
        if ($size === 1) {
            return new Node($this->grid[$i][$j] === 1, true);
        }

        $size /= 2;
        $topLeft = $this->runNode($i, $j, $size);
        $topRight = $this->runNode($i, $j + $size, $size);
        $bottomLeft = $this->runNode($i + $size, $j, $size);
        $bottomRight = $this->runNode($i + $size, $j + $size, $size);
        if (
            $topLeft->isLeaf &&
            $topRight->isLeaf &&
            $bottomLeft->isLeaf &&
            $bottomRight->isLeaf &&
            $topLeft->val === $topRight->val &&
            $topLeft->val === $bottomLeft->val &&
            $topLeft->val === $bottomRight->val
        ) {
            return new Node($topLeft->val, true);
        }

        $node = new Node(false, false);
        $node->topLeft = $topLeft;
        $node->topRight = $topRight;
        $node->bottomLeft = $bottomLeft;
        $node->bottomRight = $bottomRight;

        return $node;
    }
}