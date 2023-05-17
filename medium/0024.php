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
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        $originHead = $head;
        $first = $head;
        $second = $head->next;
        while ($first && $second) {
            $temp = $first->val;
            $first->val = $second->val;
            $second->val = $temp;
            $first = $first->next->next;
            $second = $second->next;
            if ($second) {
                $second = $second->next;
            }
        }

        return $originHead;
    }
}