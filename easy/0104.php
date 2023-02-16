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
     * @return Integer
     */
    function maxDepth($root) {
        $this->maxLayer = 0;
        $this->runNode($root, 1);

        return $this->maxLayer;
    }

    public function runNode($node, $layer)
    {
        if (!$node) {
            return;
        }

        $this->maxLayer = max($this->maxLayer, $layer);
        $this->runNode($node->left, $layer + 1);
        $this->runNode($node->right, $layer + 1);
    }
}