<?php

class Cashier {
    protected $n;
    protected $nCount;
    protected $discount;
    protected $productPrice;
    /**
     * Runtime: 420 ms, faster than 100.00% of PHP online submissions for Apply Discount Every n Orders.
    Memory Usage: 35.5 MB, less than 100.00% of PHP online submissions for Apply Discount Every n Orders.
     *
     * @param Integer $n
     * @param Integer $discount
     * @param Integer[] $products
     * @param Integer[] $prices
     */
    function __construct($n, $discount, $products, $prices) {
        $this->n            = $n;
        $this->discount     = $discount;
        $this->nCount       = 0;
        $this->productPrice = [];
        foreach ($products as $index => $productKey) {
            $this->productPrice[$productKey] = $prices[$index];
        }
    }

    /**
     * @param Integer[] $product
     * @param Integer[] $amount
     * @return Float
     */
    function getBill($product, $amount) {
        $this->nCount++;
        $total = 0;
        foreach ($product as $index => $productKey) {
            $total += $this->productPrice[$productKey] * $amount[$index];
        }

        return ($this->nCount % $this->n) ? $total :
            $total * (100 - $this->discount) / 100;
    }
}

/**
 * Your Cashier object will be instantiated and called as such:
 * $obj = Cashier($n, $discount, $products, $prices);
 * $ret_1 = $obj->getBill($product, $amount);
 */
