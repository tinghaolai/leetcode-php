<?php

/**
 * Runtime: 22 ms, faster than 81.45% of PHP online submissions for Add Two Numbers.
Memory Usage: 19.1 MB, less than 96.29% of PHP online submissions for Add Two Numbers.
 *
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
        $head = new ListNode();
        $result = $head;
        $carry = 0;
        while ($l1 || $l2 || $carry) {
            $amount = 0;
            if ($l1) {
                $amount += $l1->val;
                $l1 = $l1->next;
            }

            if ($l2) {
                $amount += $l2->val;
                $l2 = $l2->next;
            }

            $amount += $carry;
            if ($amount > 9) {
                $carry = 1;
                $amount -= 10;
            } else {
                $carry = 0;
            }

            $result->val = $amount;
            if ($l1 || $l2 || $carry) {
                $result->next = new ListNode();
                $result = $result->next;
            }
        }

        return $head;
    }
}