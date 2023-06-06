<?php


class FrequencyTracker {
    /**
     */
    function __construct() {
        $this->numToFreq = [];
        $this->freqToNum = [];
    }

    /**
     * @param Integer $number
     * @return NULL
     */
    function add($number) {
        if (isset($this->numToFreq[$number])) {
            $prevFreq = $this->numToFreq[$number];
            unset($this->freqToNum[$prevFreq][$number]);
            if (empty($this->freqToNum[$prevFreq])) {
                unset($this->freqToNum[$prevFreq]);
            }

            $this->numToFreq[$number]++;
            $this->freqToNum[$prevFreq + 1][$number] = true;
        } else {
            $this->numToFreq[$number] = 1;
            $this->freqToNum[1][$number] = true;
        }
    }

    /**
     * @param Integer $number
     * @return NULL
     */
    function deleteOne($number) {
        if (!empty($this->numToFreq[$number])) {
            $prevFreq = $this->numToFreq[$number];
            unset($this->freqToNum[$prevFreq][$number]);
            if (empty($this->freqToNum[$prevFreq])) {
                unset($this->freqToNum[$prevFreq]);
            }
            $this->numToFreq[$number]--;
            if ($this->numToFreq[$number] == 0) {
                unset($this->numToFreq[$number]);
            } else {
                $this->freqToNum[$this->numToFreq[$number]][$number] = true;
            }
        }
    }

    /**
     * @param Integer $frequency
     * @return Boolean
     */
    function hasFrequency($frequency) {
        return !empty($this->freqToNum[$frequency]);
    }
}

/**
 * Your FrequencyTracker object will be instantiated and called as such:
 * $obj = FrequencyTracker();
 * $obj->add($number);
 * $obj->deleteOne($number);
 * $ret_3 = $obj->hasFrequency($frequency);
 */