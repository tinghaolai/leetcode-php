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
     * @param Integer $start
     * @return Integer
     */
    function amountOfTime($root, $start) {
        $this->time = 0;
        $start = $this->findStart($root, $start);
        $this->infect($start, 0);

        return $this->time;
    }

    function findStart($root, $start) {
        if ($root->val === $start) {
            return $root;
        }

        foreach (['right', 'left'] as $c) {
            if ($next = $root->$c) {
                $next->p = $root;
                $next->pFrom = $c;
                $target = $this->findStart($next, $start);
                if ($target) {
                    return $target;
                }
            }
        }

        return null;
    }

    function infect($node, $time, $fromC = false) {
        if ($time > $this->time) {
            $this->time = $time;
        }

        foreach (['right', 'left', 'p'] as $name) {
            if ($name === 'p' && $fromC) {
                continue;
            }

            $hadRun = $name . 'hadRun';
            if ($node->$hadRun) {
                continue;
            }

            if ($node->$name) {
                $node->$hadRun = true;
                $next = $node->$name;
                if ('p' === $name) {
                    $pHadRun = $node->pFrom . 'hadRun';
                    $next->$pHadRun = true;
                } else {
                    $next->pHadRun = true;
                }

                $this->infect($next, $time + 1, $name !== 'p');
            }
        }
    }

    function infect_v1($node, $time, $ifP = false, $pFrom = null) {
        if ($time > $this->time) {
            $this->time = $time;
        }

        foreach (['right', 'left', 'p'] as $name) {
            if ($ifP && $name === $pFrom) {
                continue;
            }

            print ('node val: ' . $node->val . ', name: ' . $name);
            if ($node->$name) {
                $this->infect($node->$name, $time + 1, $name === 'p', $node->pFrom);
            }
        }
    }
}