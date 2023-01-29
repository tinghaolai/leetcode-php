<?php

/**
 * Runtime: 12 ms, faster than 73.53% of PHP online submissions for Path Sum.
Memory Usage: 17 MB, less than 17.65% of PHP online submissions for Path Sum.
 *
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
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum) {
        if (!$root) {
            return false;
        }

        $targetSum -= $root->val;
        if (
            !$root->left &&
            !$root->right
        ) {
            return $targetSum === 0;
        }

        return ($this->walkThrough($root->left, $targetSum) || $this->walkThrough($root->right, $targetSum));
    }
}
