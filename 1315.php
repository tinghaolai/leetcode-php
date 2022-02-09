<?php

/**
 * Runtime: 60 ms, faster than 100.00% of PHP online submissions for Sum of Nodes with Even-Valued Grandparent.
Memory Usage: 22.7 MB, less than 100.00% of PHP online submissions for Sum of Nodes with Even-Valued Grandparent.
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
     * @return Integer
     */
    function sumEvenGrandparent($root) {
        return $this->sumOfSelfAndGrandChild($root, 1, 1);
    }

    function sumOfSelfAndGrandChild($node, $urDad, $urGrandFather)
    {
        if ($node === null) {
            return 0;
        }

        $selfScore = ($urGrandFather % 2 === 0) ? $node->val : 0;
        $childrenScore = $this->sumOfSelfAndGrandChild($node->left, $node->val, $urDad) +
                        $this->sumOfSelfAndGrandChild($node->right, $node->val, $urDad);

        return $selfScore + $childrenScore;
    }
}
