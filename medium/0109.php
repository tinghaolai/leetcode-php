<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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
     * @param ListNode $head
     * @return TreeNode
     */
     function sortedListToBST($head)
     {
         $nodes = [];
         $length = 0;
         while ($head) {
             $nodes[] = $head->val;
             $length++;

             $head = $head->next;
         }

         return $this->buildTree($nodes, $length);
    }

    public function buildTree($nodes, $length)
    {
        if ($length <= 0) {
            return null;
        }

        $mid = (int) ($length / 2);
        $treeNode = new TreeNode($nodes[$mid]);
        $treeNode->left = $this->buildTree(
            array_slice($nodes, 0, $mid),
            $mid
        );
        $treeNode->right = $this->buildTree(
            array_slice($nodes, $mid + 1),
            $length - $mid - 1
        );

        return $treeNode;
    }
}