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
    function deepestLeavesSum($root) {
        $this->maxLayer = 0;
        $this->maxLayerSum = 0;
        $this->runNode($root, 0);

        return $this->maxLayerSum;
    }

    function runNode($node, $layer) {
        if (!$node) {
            return;
        }

        if ($layer > $this->maxLayer) {
            $this->maxLayer = $layer;
            $this->maxLayerSum = 0;
        }

        if ($layer === $this->maxLayer) {
            $this->maxLayerSum += $node->val;
        }

        $this->runNode($node->right, $layer + 1);
        $this->runNode($node->left, $layer + 1);
     }
}