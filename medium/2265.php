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
    function averageOfSubtree($root) {
        $this->result = 0;
        $this->runNode($root);

        return $this->result;
    }

    function runNode($node)
    {
        if (!$node) {
            return ['sum' => 0, 'count' => 0];
        }

        $leftResult = $this->runNode($node->left);
        $rightResult = $this->runNode($node->right);

        $sum = $node->val + $leftResult['sum'] + $rightResult['sum'];
        $count = 1 + $leftResult['count'] + $rightResult['count'];

        if (floor($sum /$count) == $node->val) {
            $this->result++;
        }

        return [
            'sum' => $sum,
            'count' => $count,
        ];
    }
}