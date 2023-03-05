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

    function kthLargestLevelSum($root, $k) {
        $this->maxLayer = 0;
        $this->layerVals = [];
        $this->runNode($root, 1);
        if ($this->maxLayer < $k) {
            return -1;
        }

        sort($this->layerVals);
        return $this->layerVals[$this->maxLayer - $k];
    }

    function runNode($node, $layer)
    {
        if (!$node) {
            return;
        }

        $this->maxLayer = max($this->maxLayer, $layer);
        if (empty($this->layerVals[$layer])) {
            $this->layerVals[$layer] = $node->val;
        } else {
            $this->layerVals[$layer] += $node->val;
        }

        $this->runNode($node->left, $layer + 1);
        $this->runNode($node->right, $layer + 1);
    }

}