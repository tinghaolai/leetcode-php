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


// 0731
class MyCalendarTwo {
    public $root = null;
    /**
     */
    function __construct() {
    }

    /**
     * @param Integer $start
     * @param Integer $end
     * @return Boolean
     */
    function book($start, $end) {
        $this->changeNodes = [];
        $this->changeNodeVal = [];
        $result = $this->insert($this->root, $start, $end, 1);
        if ($result) {
            foreach ($this->changeNodes as $i => &$changeNode) {
                $changeNode = $this->changeNodeVal[$i];
            }
        }

        return $result;
    }

    private function insert(&$node, $start, $end, $depth) {
        if ($depth >= 3) {
            return false;
        }

        if (!$node) {
            $this->changeNodes[] = &$node;
            $this->changeNodeVal[] = new Tree($start, $end, $depth);

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
