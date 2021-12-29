<?php

class Solution
{
    /**
     * Runtime: 99 ms, faster than 100.00% of PHP online submissions for Search Suggestions System.
    Memory Usage: 19.6 MB, less than 100.00% of PHP online submissions for Search Suggestions System.
     *
     * @param String[] $products
     * @param String $searchWord
     * @return String[][]
     */
    function suggestedProducts($products, $searchWord)
    {
        sort($products);
        $outPut = [];
        $currentSearch = '';
        for ($i = 0; $i < strlen($searchWord); $i++) {
            $currentSearch .= $searchWord[$i];
            $recommends = [];
            foreach ($products as $product) {
                if (strpos($product, $currentSearch) === 0) {
                    $recommends[] = $product;
                    if (count($recommends) === 3) {
                        break;
                    }
                }
            }

            if (count($recommends)) {
                $outPut[] = $recommends;
            }
        }

        return $outPut;
    }
}
