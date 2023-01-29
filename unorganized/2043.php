<?php

class Bank {
    protected $balance;
    protected $balanceCount;
    /**
     * @param Integer[] $balance
     */
    function __construct($balance) {
        $this->balance = $balance;
        $this->balanceCount = count($balance);
    }

    /**
     * @param Integer $account1
     * @param Integer $account2
     * @param Integer $money
     * @return Boolean
     */
    function transfer($account1, $account2, $money) {
        if (
            $account2 > $this->balanceCount ||
            !$this->withdraw($account1, $money)
        ) {
            return false;
        }

        return $this->deposit($account2, $money);
    }

    /**
     * @param Integer $account
     * @param Integer $money
     * @return Boolean
     */
    function deposit($account, $money) {
        if ($account > $this->balanceCount) {
            return false;
        }

        $this->balance[$account - 1] += $money;
        return true;
    }

    /**
     * @param Integer $account
     * @param Integer $money
     * @return Boolean
     */
    function withdraw($account, $money) {
        if (
            $account > $this->balanceCount ||
            $money > $this->balance[$account]
        ) {
            return false;
        }

        $this->balance[$account - 1] -= $money;
        return true;
    }
}

/**
 * Your Bank object will be instantiated and called as such:
 * $obj = Bank($balance);
 * $ret_1 = $obj->transfer($account1, $account2, $money);
 * $ret_2 = $obj->deposit($account, $money);
 * $ret_3 = $obj->withdraw($account, $money);
 */
