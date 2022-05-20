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
     * Runtime: 12 ms, faster than 38.89% of PHP online submissions for Root Equals Sum of Children.
    Memory Usage: 19.2 MB, less than 44.44% of PHP online submissions for Root Equals Sum of Children.
     *
     * @param TreeNode $root
     * @return Boolean
     */
    function checkTree($root) {
        return $root->val === $root->right->val + $root->left->val;
    }
}