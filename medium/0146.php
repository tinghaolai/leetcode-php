<?php

class Node
{
    public $next = null;
    public $prev = null;
    public $key;
    public $val;

    public function __construct($key, $val)
    {
        $this->key = $key;
        $this->val = $val;
    }
}


class LRUCache {
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->cache = [];
        $this->count = 0;
        $this->head = new Node(-1, -1);
        $this->tail = new Node(-1, -1);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    public function printHeadToTail()
    {
        $node = $this->head;
        $s = [];
        while ($node) {
            if ($node->val !== -1) {
                $s[] = $node->val;
            }

            $node = $node->next;
        }
        echo implode(' -> ', $s) . PHP_EOL;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (!isset($this->cache[$key])) {
            return -1;
        }

        $this->moveToTail($key);
        return $this->cache[$key]->val;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (isset($this->cache[$key])) {
            $this->cache[$key]->val = $value;
            $this->moveToTail($key);
            return;
        }

        if ($this->count < $this->capacity) {
            $this->insertTail($key, $value);
            return;
        }

        $this->removeHead();
        $this->insertTail($key, $value);
    }

    function moveToTail($key)
    {
        $node = $this->cache[$key];
        $nodeNext = $node->next;
        $nodePrev = $node->prev;
        $nodePrev->next = $nodeNext;
        $nodeNext->prev = $nodePrev;

        $realTail = $this->tail->prev;
        $realTail->next = $node;
        $node->prev = $realTail;
        $node->next = $this->tail;
        $this->tail->prev = $node;
    }

    function removeHead() {
        unset($this->cache[$this->head->next->key]);
        $this->head->next = $this->head->next->next;
        $this->head->next->prev = $this->head;
        $this->count--;
    }

    function insertTail($key, $value)
    {
        $node = new Node($key, $value);
        $realTail = $this->tail->prev;
        $node->prev = $realTail;
        $node->next = $this->tail;
        $realTail->next = $node;
        $this->tail->prev = $node;
        $this->cache[$key] = $node;
        $this->count++;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */