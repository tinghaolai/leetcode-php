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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $l1 = $this->reserve($l1);
        $l2 = $this->reserve($l2);
        $carry = 0;
        $head = null;
        while ($l1 || $l2) {
            $sum = 0;
            if ($l1) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }

            if ($l2) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }

            $sum += $carry;
            $carry = 0;
            if ($sum >= 10) {
                $carry = 1;
                $sum -= 10;
            }

            $node = new ListNode($sum);
            $node->next = $head;
            $head = $node;
        }

        if ($carry) {
            $node = new ListNode($carry);
            $node->next = $head;
            $head = $node;
        }

        return $head;
    }

    function reserve($l) {
        $prev = null;
        $curr = $l;
        while ($curr != null) {
            $next = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
        }

        return $prev;
    }
}