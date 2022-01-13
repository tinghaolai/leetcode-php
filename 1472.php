<?php

class BrowserHistory {
    protected $stack;
    protected $index;
    /**
     * Runtime: 203 ms, faster than 100.00% of PHP online submissions for Design Browser History.
    Memory Usage: 22.3 MB, less than 100.00% of PHP online submissions for Design Browser History.
     *
     * @param String $homepage
     */
    function __construct($homepage) {
        $this->index = 0;
        $this->stack = [$homepage];
    }

    /**
     * @param String $url
     * @return NULL
     */
    function visit($url) {
        $this->index++;
        $this->stack[$this->index] = $url;
        $this->stack = array_slice($this->stack, 0, $this->index + 1);
    }

    /**
     * @param Integer $steps
     * @return String
     */
    function back($steps) {
        $this->index -= $steps;
        if ($this->index < 0) {
            $this->index = 0;
        }

        return $this->stack[$this->index];
    }

    /**
     * @param Integer $steps
     * @return String
     */
    function forward($steps) {
        $this->index += $steps;
        if ($this->index >= count($this->stack)) {
            $this->index = count($this->stack) - 1;
        }

        return $this->stack[$this->index];
    }
}

/**
 * Your BrowserHistory object will be instantiated and called as such:
 * $obj = BrowserHistory($homepage);
 * $obj->visit($url);
 * $ret_2 = $obj->back($steps);
 * $ret_3 = $obj->forward($steps);
 */
