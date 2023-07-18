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
     * @param Integer $k
     * @return ListNode
     */
    function swapNodes($head, $k) {
        $originHead = $head;
        $swapNode = null;
        $i = 1;
        $reverseHead = null;
        while ($head) {
            if ($i === $k) {
                $swapNode = $head;
            }

            $newNode = $head;
            $newNode->newNext = $reverseHead;
            $reverseHead = $newNode;

            $head = $head->next;
            $i++;
        }

        $reserveSwapNode = null;
        $i = 1;
        while ($reverseHead) {
            if ($i === $k) {
                $reserveSwapNode = $reverseHead;
            }

            $reverseHead = $reverseHead->newNext;
            $i++;
        }

        $temp = $swapNode->val;
        $swapNode->val = $reserveSwapNode->val;
        $reserveSwapNode->val = $temp;

        return $originHead;
    }
}