<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        $pos = [];
        $pos[(string) $head->val] = [$head];
        while ($head = $head->next) {
            if (array_key_exists(((string) $head->val), $pos)) {
                foreach ($pos[(string) $head->val] as $node) {
                    if ($node === $head) {
                        return $head;
                    }
                }
            }

            $head->run = true;
            $pos[(string) $head->val][] = $head;
        }

        return null;
    }
}