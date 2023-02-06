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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function constructMaximumBinaryTree($nums) {
        return $this->runNums($nums);
    }

    function runNums($nums)
    {
        if (empty($nums)) {
            return null;
        }

        $max = $nums[0];
        $maxIndex = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] > $max) {
                $max = $nums[$i];
                $maxIndex = $i;
            }
        }

        $node = new TreeNode($max);
        $node->left = $this->runNums(array_slice($nums, 0, $maxIndex));
        $node->right = $this->runNums(array_slice($nums, $maxIndex + 1));

        return $node;
    }
}