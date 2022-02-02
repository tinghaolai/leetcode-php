<?php

class ParkingSystem {
    protected $slots;
    /**
     * Runtime: 163 ms, faster than 10.00% of PHP online submissions for Design Parking System.
    Memory Usage: 20.3 MB, less than 10.00% of PHP online submissions for Design Parking System.
     *
     * @param Integer $big
     * @param Integer $medium
     * @param Integer $small
     */
    function __construct($big, $medium, $small) {
        $this->slots[1] = $big;
        $this->slots[2] = $medium;
        $this->slots[3] = $small;
    }

    /**
     * @param Integer $carType
     * @return Boolean
     */
    function addCar($carType) {
        if (!isset($this->slots[$carType]) || $this->slots[$carType] === 0) {
            return false;
        }

        $this->slots[$carType]--;
        return true;
    }
}

/**
 * Your ParkingSystem object will be instantiated and called as such:
 * $obj = ParkingSystem($big, $medium, $small);
 * $ret_1 = $obj->addCar($carType);
 */
