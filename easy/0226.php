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
     * @return TreeNode
     */
    function invertTree($root) {
        return $this->switchChildren($root);
    }

    function switchChildren($node) {
        if (!$node) {
            return null;
        }

        $left = $this->switchChildren($node->left);
        $right = $this->switchChildren($node->right);
        $node->left = $right;
        $node->right = $left;

        return $node;
    }
}