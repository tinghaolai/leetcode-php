<?php

class MyCalendar {
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
        return $this->insert($this->root, $start, $end);
    }

    private function insert(&$node, $start, $end) {
        if (!$node) {
            $node = new Tree($start, $end);
            return true;
        }

        if ($end <= $node->start) {
            return $this->insert($node->left, $start, $end);
        }

        if ($start >= $node->end) {
            return $this->insert($node->right, $start, $end);
        }

        return false;
    }
}
class Tree
{
    public $start;
    public $end;
    public $left = null;
    public $right = null;
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
}
