<?php

class Solution {
    protected $text = '';
    protected $cursorIndex = 0;

    /**
     */
    function __construct() {

    }

    /**
     * @param String $text
     * @return NULL
     */
    function addText($text) {
        $this->text = substr_replace($this->text, $text, $this->cursorIndex, 0);
        $this->cursorIndex += strlen($text);
    }

    /**
     * @param Integer $k
     * @return Integer
     */
    function deleteText($k) {
        $k = min($k, $this->cursorIndex);
        $this->text = substr_replace($this->text, '', $this->cursorIndex - $k, $k);
        $this->cursorIndex -= $k;
        return $k;
    }

    /**
     * @param Integer $k
     * @return String
     */
    function cursorLeft($k) {
        $this->cursorIndex = max(0, $this->cursorIndex - $k);
        return substr($this->text, max(0, $this->cursorIndex - 10), min(10, $this->cursorIndex));
    }

    /**
     * @param Integer $k
     * @return String
     */
    function cursorRight($k) {
        $this->cursorIndex = min(strlen($this->text), $this->cursorIndex + $k);

        return substr($this->text, max(0, $this->cursorIndex - 10), min(10, $this->cursorIndex));
    }

    function test() {
        $text = new Solution();
        $text->addText('leetcode');
        $text->deleteText(4);
        $text->addText('practice');
        $text->cursorRight(3);
        $text->cursorLeft(8);
        $text->deleteText(10);
        $text->cursorLeft(2);
        $text->cursorRight(6);
//        $text->addText('arnvmumatgmyw');
//        $text->deleteText(5);
//        $text->addText('zrlufuifuy');
//        $text->cursorLeft('2', true);
    }
}
//arnvmumazrlufuifuy
//["TextEditor","addText","deleteText","addText","cursorLeft","addText","deleteText","addText","cursorLeft","deleteText"]
//[[],["arnvmumatgmyw"],[5],["zrlufuifuy"],[2],["unh"],[20],["kwwp"],[6],[9]]
//TextEditor

/**
 * Your TextEditor object will be instantiated and called as such:
 * $obj = TextEditor();
 * $obj->addText($text);
 * $ret_2 = $obj->deleteText($k);
 * $ret_3 = $obj->cursorLeft($k);
 * $ret_4 = $obj->cursorRight($k);
 */