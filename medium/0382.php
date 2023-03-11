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
     */
    function __construct($head) {
        $this->length = 0;
        $this->vals = [];
        while ($head) {
            $this->length++;
            $this->vals[] = $head->val;

            $head = $head->next;
        }
    }

    /**
     * @return Integer
     */
    function getRandom() {
        $index = rand(0, $this->length - 1);
        return $this->vals[$index];
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($head);
 * $ret_1 = $obj->getRandom();
 */