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
 class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    /**
     * Runtime: 21 ms, faster than 100.00% of PHP online submissions for Recover a Tree From Preorder Traversal.
    Memory Usage: 19.7 MB, less than 100.00% of PHP online submissions for Recover a Tree From Preorder Traversal.
     *
     * @param String $traversal
     * @return TreeNode
     */
    function recoverFromPreorder($traversal) {
        $i = 0;
        $currentNum = $traversal[$i];
        while (isset($traversal[$i+ 1]) && $traversal[$i + 1] !== '-') {
            $i++;
            $currentNum .= $traversal[$i];
        }

        $root = new TreeNode((int) $currentNum);
        $currentLayerNode = [$root];
        $currentLayer = 0;
        for ($i = $i + 1; $i < strlen($traversal); $i++) {
            if ($traversal[$i] === '-') {
                $currentLayer++;

                continue;
            }

            $currentNum = $traversal[$i];
            while (isset($traversal[$i + 1]) && $traversal[$i + 1] !== '-') {
                $i++;
                $currentNum .= $traversal[$i];
            }

            $currentNode = new TreeNode((int) $currentNum);
            $parent = $currentLayerNode[$currentLayer - 1];
            $childName = ($parent->left) ? 'right' : 'left';
            $parent->$childName = $currentNode;

            $currentLayerNode[$currentLayer] = $currentNode;
            $currentLayer = 0;
        }

        return $root;
    }

    /**
     * @param String $traversal
     * @return array
     */
    function recoverFromPreorderArray($traversal) {
        $output = [];
        $currentLayer = 0;
        $layerCount = [];
        for ($i = 0; $i < strlen($traversal); $i++) {
            if ($traversal[$i] === '-') {
                $currentLayer++;

                continue;
            }

            if ($currentLayer === 0) {
                $output[0] = $traversal[$i];
            } else {
                if (!isset($layerCount[$currentLayer])) {
                    $layerCount[$currentLayer] = 1;
                }

                $output[($currentLayer - 1) * 2 + $layerCount[$currentLayer]] = $traversal[$i];
                $layerCount[$currentLayer]++;
            }

            $currentLayer = 0;
        }

        return $output;
    }

    function test()
    {
//        return $this->recoverFromPreorder('1-2--3--4-5--6--7');
//        return $this->recoverFromPreorder('1-401--349---90--88');
        return $this->recoverFromPreorder('10-7--8');
    }
}