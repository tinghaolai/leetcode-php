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
    function bstToGst($root) {
        $this->currentVal = 0;
        $this->runNode($root);
        return $root;
    }

    public function runNode($node) {
        if (!$node) {
            return;
        }

        $this->runNode($node->right);
        $node->val = $node->val + $this->currentVal;
        $this->currentVal = $node->val;
        $this->runNode($node->left);
    }
}