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
function sumNumbers($root) {
        $this->result = 0;
        $this->findLeaf($root);

        return $this->result;
    }

    function findLeaf($node, $currentVal = '') {
        if (!$node) {
            return;
        }

        $currentVal .= $node->val;
        if (!$node->left && !$node->right) {
            $this->result += (int) $currentVal;
        }

        $this->findLeaf($node->left, $currentVal);
        $this->findLeaf($node->right, $currentVal);
    }
}