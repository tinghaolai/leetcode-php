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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $vals = [];
        foreach ($lists as $node) {
            while ($node) {
                $vals[] = $node->val;
                $node = $node->next;
            }
        }

        sort($vals);
        $head = new ListNode($vals[0]);
        $current = $head;
        $count = count($vals);
        for ($i = 1; $i < $count; $i++) {
            $temp = new ListNode($vals[$i]);
            $current->next = $temp;
            $current = $temp;
        }

        return $head;
    }

    function test()
    {

    }
}