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
    function replaceValueInTree($root) {
        $this->layerTotal = [];
        $this->postOrder($root, 0);
        $this->recalculate($root, -1, 0);
        return $root;
    }

    function recalculate($node, $fatherLayer, $fatherTotal) {
        if (!$node) {
            return;
        }

        if ($fatherLayer === -1) {
            $node->val = 0;
        } else {
            $node->val = $this->layerTotal[$fatherLayer + 1] - $fatherTotal;
        }

        $this->recalculate($node->left, $fatherLayer + 1, $node->childTotal);
        $this->recalculate($node->right, $fatherLayer + 1, $node->childTotal);

        return $node;
    }

    function postOrder($node, $layer)
    {
        if (!$node) {
            return 0;
        }

        $left = $this->postOrder($node->left, $layer + 1);
        $right = $this->postOrder($node->right, $layer + 1);
        $node->childTotal = $left + $right;
        if (!isset($this->layerTotal[$layer])) {
            $this->layerTotal[$layer] = 0;
        }

        $this->layerTotal[$layer] += $node->val;
        return $node->val;
    }
}