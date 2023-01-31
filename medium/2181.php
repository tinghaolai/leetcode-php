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
    function mergeNodes($head) {
        $nodes = [];
        $currentVal = 0;
        while ($head) {
            if ($head->val === 0 && $currentVal !== 0) {
                $nodes[] = $currentVal;
                $currentVal = 0;
            } else if ($head->val !== 0) {
                $currentVal += $head->val;
            }

            $head = $head->next;
        }

        if (empty($nodes)) {
            return null;
        }

        $head = null;
        $prev = null;
        for ($i = count($nodes) - 1; $i >= 0; $i--) {
            $head = new ListNode($nodes[$i], $prev);
            $prev = $head;
        }

        return $head;
    }
}