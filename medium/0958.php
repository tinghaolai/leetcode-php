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
     * @return Boolean
     */
    function isCompleteTree($root)
    {
        $queue = [$root];
        $newQueue = [];
        $newQueueHasValue = false;
        $currentNullFound = false;
        while (!empty($queue)) {
            $current = array_shift($queue);
            if ($current) {
                $newQueueHasValue = true;
                $newQueue[] = $current->left;
                $newQueue[] = $current->right;
            } else {
                $currentNullFound = true;
                $newQueue[] = null;
                $newQueue[] = null;
            }

            if (empty($queue)) {
                $nullCount = 0;
                $count = 0;
                foreach ($newQueue as $nextQueue) {
                    $count++;
                    if (is_null($nextQueue)) {
                        $nullCount++;
                    }
                }

                if ($count === $nullCount) {
                    return true;
                }

                $nullFound = false;
                foreach ($newQueue as $nextQueue) {
                    if ($nextQueue === null) {
                        $nullFound = true;
                        continue;
                    }

                    if ($nullFound && $nextQueue !== null) {
                        return false;
                    }
                }

                if ($currentNullFound && $newQueueHasValue) {
                    return false;
                }

                $queue = $newQueue;
                $newQueue = [];
                $newQueueHasValue = false;
                $currentNullFound = false;
            }
        }
    }

}