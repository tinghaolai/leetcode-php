<?php

/**
 *
 * Runtime: 36 ms, faster than 94.44% of PHP online submissions for Binary Search Tree Iterator.
Memory Usage: 25.8 MB, less than 94.44% of PHP online submissions for Binary Search Tree Iterator.
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
class BSTIterator {
    protected $stack = [];
    protected $root;

    /**
     * @param TreeNode $root
     */
    function __construct($root) {
        $this->stackTravel($root);
    }

    /**
     * @return Integer
     */
    function next() {
        $node = array_pop($this->stack);
        $this->stackTravel($node->right);

        return $node->val;
    }

    /**
     * @return Boolean
     */
    function hasNext() {
        return count($this->stack) !== 0;
    }

    function stackTravel($node) {
        while ($node) {
            $this->stack[] = $node;
            $node = $node->left;
        }
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */


///**
// * In-order straight-forward solution
// *
// * Runtime: 69 ms, faster than 33.33% of PHP online submissions for Binary Search Tree Iterator.
//Memory Usage: 29.3 MB, less than 5.56% of PHP online submissions for Binary Search Tree Iterator.
// *
// * Definition for a binary tree node.
// * class TreeNode {
// *     public $val = null;
// *     public $left = null;
// *     public $right = null;
// *     function __construct($val = 0, $left = null, $right = null) {
// *         $this->val = $val;
// *         $this->left = $left;
// *         $this->right = $right;
// *     }
// * }
// */
//class BSTIterator {
//    protected $current = null;
//    protected $root;
//
//    /**
//     * @param TreeNode $root
//     */
//    function __construct($root) {
//        $this->root = $root;
//    }
//
//    /**
//     * @return Integer
//     */
//    function next() {
//        if (!$this->current) {
//            $this->current = $this->root;
//            while ($this->current->left) {
//                $this->current->left->parent = $this->current;
//                $this->current = $this->current->left;
//            }
//        } else if (!$this->current->right) {
//            $val = $this->current->val;
//            $this->current = $this->current->parent;
//            while ($val > $this->current->val) {
//                $val = $this->current->val;
//                $this->current = $this->current->parent;
//            }
//        } else {
//            $this->current->right->parent = $this->current;
//            $this->current = $this->current->right;
//            while ($this->current->left) {
//                $this->current->left->parent = $this->current;
//                $this->current = $this->current->left;
//            }
//        }
//
//        return $this->current->val;
//    }
//
//    /**
//     * @return Boolean
//     */
//    function hasNext() {
//        if (!$this->current) {
//            return true;
//        }
//
//        if ($this->current->right) {
//            return true;
//        }
//
//        $parent = $this->current->parent;
//        while ($parent) {
//            if ($parent->val > $this->current->val) {
//                return true;
//            }
//
//            $parent = $parent->parent;
//        }
//
//        return false;
//    }
//}
//
///**
// * Your BSTIterator object will be instantiated and called as such:
// * $obj = BSTIterator($root);
// * $ret_1 = $obj->next();
// * $ret_2 = $obj->hasNext();
// */
