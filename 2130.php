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

/**
 * Runtime: 234 ms, faster than 100.00% of PHP online submissions for Maximum Twin Sum of a Linked List.
Memory Usage: 57.2 MB, less than 50.00% of PHP online submissions for Maximum Twin Sum of a Linked List.
 *
 * Class Solution
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Integer
     */
    function pairSum($head) {
        $values = [];
        while ($head) {
            $values[] = $head->val;
            $head = $head->next;
        }

        $j   = count($values) - 1;
        $max = 0;
        for ($i = 0; $i <= count($values) / 2 - 1; $i++, $j--) {
            if ($values[$i] + $values[$j] > $max) {
                $max = $values[$i] + $values[$j];
            }
        }

        return $max;
    }
}
