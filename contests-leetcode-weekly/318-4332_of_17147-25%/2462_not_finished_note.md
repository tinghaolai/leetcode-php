## Solution through contest

Got time limit exceed, still.

### Solution logic

Sort the initial candidate array, base on the site of candidate picked each round, choose new worker into the exists candidate array, the way to not break the sorted array is that using binary search.


### Code

```php
<?php

class Solution {
    function binary_search($list, $element) {
        $start = 0;
        $end = count($list);
        while ($end - $start > 1) {
            $mid = ($start + $end) / 2;
            if ($list[$mid] < $element){
                $start = $mid;
            }
            else{
                $end = $mid;
            }
        }
        return $end;
    }

    function totalCost($costs, $k, $candidates) {
        $leftIndex = 0;
        $currentCandidates = [];
        $valFrom = [];
        for ($i = 0; $i < $candidates; $i++) {
            $leftIndex = $i;
            $cost = $costs[$i];
            $currentCandidates[] = $cost;
            if (!isset($valFrom[$cost]['left'])) {
                $valFrom[$cost]['left'] = 1;
            } else {
                $valFrom[$cost]['left']++;
            }
        }

        $cLength = count($costs);
        for ($i = 0; $i < $candidates; $i++) {
            $rightIndex = $cLength - 1 - $i;
            if ($rightIndex === $leftIndex) {
                break;
            }

            $cost = $costs[$rightIndex];
            $currentCandidates[] = $cost;
            if (!isset($valFrom[$cost]['right'])) {
                $valFrom[$cost]['right'] = 1;
            } else {
                $valFrom[$cost]['right']++;
            }
        }

        sort($currentCandidates);
        $total = 0;
        for ($i = 0; $i < $k; $i++) {
            $total += ($cost = array_shift($currentCandidates));
            if (isset($valFrom[$cost]['left']) && $valFrom[$cost]['left'] !== 0) {
                $next = 'left';
                $leftIndex++;
                $valFrom[$cost]['left']--;
            } else {
                $rightIndex--;
                $next = 'right';
                $valFrom[$cost]['right']--;
            }

            if ($leftIndex < $rightIndex) {
                $nextIndex = $next === 'left' ? $leftIndex : $rightIndex;
                $nextVal = $costs[$nextIndex];
                if (!isset($valFrom[$nextVal][$next])) {
                    $valFrom[$nextVal][$next] = 1;
                } else {
                    $valFrom[$nextVal][$next]++;
                }

                $insertIndex = $this->binary_search($currentCandidates, $nextVal);
                array_splice( $currentCandidates, $insertIndex, 0, $nextVal);
            }
        }

        return $total;
    }

    function test() {
        dd(
            $this->totalCost(
                [31,25,72,79,74,65,84,91,18,59,27,9,81,33,17,58],
                11,
                2
            )
//            $this->totalCost(
//                [17,12,10,2,7,2,11,20,8],
//                3,
//                4
//            )
        );
    }
}
```
