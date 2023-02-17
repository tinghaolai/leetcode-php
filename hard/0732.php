<?php

class Tree
{
    public $val;
    public $start;
    public $end;
    public $left = null;
    public $right = null;
    public $middle = null;
    public function __construct($start, $end, $val)
    {
        $this->start = $start;
        $this->end = $end;
        $this->val = $val;
    }
}


// 0732
class MyCalendarThree {
    public $root = null;
    public $maxDep = 0;
    /**
     */
    function __construct() {
    }

    /**
     * @param Integer $start
     * @param Integer $end
     * @return Integer
     */
    function book($startTime, $endTime) {
        $this->insert($this->root, $startTime, $endTime, 1);

        return $this->maxDep;
    }

    private function insert(&$node, $start, $end, $depth) {
        if (!$node) {
            $node = new Tree($start, $end, $depth);
            if ($depth > $this->maxDep) {
                $this->maxDep = $depth;
            }

            return true;
        }

        if (
            $start >= $node->start &&
            $end <= $node->end
        ) {
            return $this->insert($node->middle, $start, $end, $depth + 1);
        }

        if ($end <= $node->start) {
            return $this->insert($node->left, $start, $end, $depth);
        }

        if ($start >= $node->end) {
            return $this->insert($node->right, $start, $end, $depth);
        }

        if ($start < $node->start && $end > $node->end) {
            $result = $this->insert($node->middle, $node->start, $node->end, $depth + 1);
            if (!$result) {
                return false;
            }

            $result =  $this->insert($node->left, $start, $node->start, $depth);
            if (!$result) {
                return false;
            }

            return $this->insert($node->right, $node->end, $end, $depth);
        }

        if ($start < $node->start) {
            $result = $this->insert($node->middle, $node->start, $end, $depth + 1);
            if (!$result) {
                return false;
            }

            return $this->insert($node->left, $start, $node->start, $depth);
        }

        $result = $this->insert($node->middle, $start, $node->end, $depth + 1);
        if (!$result) {
            return false;
        }

        return $this->insert($node->right, $node->end, $end, $depth);
    }
}