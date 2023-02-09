<?php

class Solution {

    public function test()
    {
        $result = $this->distinctNames(
            ["coffee","donuts","time","toffee"]
        );

        dd($result);
    }

    /**
     * @param String[] $ideas
     * @return Integer
     */
    function distinctNames($ideas) {
        $groups = [];
        foreach ($ideas as $idea) {
            $group = $idea[0];
            $groupVal = substr($idea, 1);
            if (empty($groups[$group])) {
                $groups[$group] = [
                    'values' => [$groupVal => 'true'],
                    'count' => 1,
                ];
            } else {
                $groups[$group]['values'][$groupVal] = 'true';
                $groups[$group]['count']++;
            }
        }

        $groupLength = count($groups);
        $groups = array_values($groups);
        $output = 0;
        foreach ($groups as $i => $group) {
            for ($j = $i + 1; $j < $groupLength; $j++) {
                $group2 = $groups[$j];
                $m = $group['count'];
                $n = $group2['count'];
                foreach ($group['values'] as $k => $true) {
                    if (!empty($group2['values'][$k])) {
                        $m--;
                        $n--;
                    }
                }

                $output += ($m * $n);
            }
        }

        return $output * 2;
    }
}