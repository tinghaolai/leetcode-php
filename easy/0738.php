<?php

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
     function minDiffInBST($root) {
        $this->vals = [];
        $this->runNode($root);

        sort($this->vals);
        $min = abs($this->vals[1] - $this->vals[0]);
        for ($i = 2; $i < count($this->vals); $i++) {
            $diff = abs($this->vals[$i] - $this->vals[$i - 1]);
            $min = min($diff, $min);
        }

        return $min;
    }

    public function runNode($node)
    {
        $this->vals[] = $node->val;
        foreach ([
            'left',
            'right',
        ] as $direction) {
            if ($node->$direction) {
                $this->runNode($node->$direction);
            }
        }
    }
}