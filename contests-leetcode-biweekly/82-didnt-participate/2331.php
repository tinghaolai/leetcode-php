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
     * Runtime: 42 ms
    Memory Usage: 19.8 MB
     *
     * @param TreeNode $root
     * @return Boolean
     */
    function evaluateTree($root) {
        return $this->travel($root);
    }

    function travel($node)
    {
        switch ($node->val) {
            case 0:
                return false;
            case 1:
                return true;
            case 2:
                return $this->travel($node->left) || $this->travel($node->right);
            case 3:
                return $this->travel($node->left) && $this->travel($node->right);
        }

        return false;
    }
}