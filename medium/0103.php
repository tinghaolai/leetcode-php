<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
        $directions = [
            1 => 'right',
            -1 => 'left',
        ];

        $result = [];
        $base = -1;
        $layer = 0;
        $stack = [$root];
        $additionStack = [];
        while (!empty($stack) || !empty($additionStack)) {
            if (empty($stack)) {
                $layer++;
                $base *= -1;
                $stack = $additionStack;
                $additionStack = [];
            }

            $node = array_shift($stack);
            if (!$node) {
                continue;
            }

            if (empty($result[$layer])) {
                $result[$layer] = [];
            }

            $result[$layer][] = $node->val;
            foreach ($directions as $i => $val) {
                $direction = $directions[$base * $i];
                array_unshift($additionStack, $node->$direction);
            }
        }

        return $result;
    }
}