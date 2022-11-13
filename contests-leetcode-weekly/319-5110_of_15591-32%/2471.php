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
    protected $orderedNodes;
    protected $valueNodes;
    protected $operations;
    protected $sortedLayerVal;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minimumOperations($root) {
        $this->orderedNodes = [];
        $this->valueNodes = [];
        $this->sortedLayerVal = [];
        if ($root->left) {
            $this->orderedNodes[] = $root->left;
            $this->sortedLayerVal[] = $root->left->val;
            $this->valueNodes[$root->left->val] = $root->left;
        }

        if ($root->right) {
            $this->orderedNodes[] = $root->right;
            $this->sortedLayerVal[] = $root->right->val;
            $this->valueNodes[$root->right->val] = $root->right;
        }

        sort($this->sortedLayerVal);
        $this->operations = 0;
        $this->checkIncreaseOrder(1);

        return $this->operations;
    }

    function checkIncreaseOrder($layer)
    {
        if (empty($this->orderedNodes)) {
            return;
        }

        $tempNextOrderedNodes = [];
        $tempSortVal = [];
        $tempNextValueNodes = [];
        foreach ($this->orderedNodes as $index => $node) {
            $correctVal = array_shift($this->sortedLayerVal);
            if ($node->val !== $correctVal) {
                $this->operations++;
                $changeNode = $this->valueNodes[$correctVal];
                $changeNode->val = $node->val;
                $this->valueNodes[$changeNode->val] = $changeNode;
            }

            if ($node->left) {
                $tempNextOrderedNodes[] = $node->left;
                $tempSortVal[] = $node->left->val;
                $tempNextValueNodes[$node->left->val] = $node->left;
            }

            if ($node->right) {
                $tempNextOrderedNodes[] = $node->right;
                $tempSortVal[] = $node->right->val;
                $tempNextValueNodes[$node->right->val] = $node->right;
            }
        }

        sort($tempSortVal);
        $this->orderedNodes = $tempNextOrderedNodes;
        $this->sortedLayerVal = $tempSortVal;
        $this->valueNodes = $tempNextValueNodes;

        $this->checkIncreaseOrder($layer + 1);
    }
}