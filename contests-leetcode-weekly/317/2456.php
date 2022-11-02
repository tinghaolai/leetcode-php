<?php


class Solution
{
    /**
     * Runtime: 685 ms, faster than 75.00% of PHP online submissions for Most Popular Video Creator.
     * Memory Usage: 125.9 MB, less than 25.00% of PHP online submissions for Most Popular Video Creator.
     *
     * @param String[] $creators
     * @param String[] $ids
     * @param Integer[] $views
     * @return String[][]
     */
    function mostPopularCreator($creators, $ids, $views)
    {
        $currentMax = 0;
        $currentMaxCreators = [];
        $creatorSums = [];
        for ($i = 0; $i < count($creators); $i++) {
            $creator = $creators[$i];
            $videoId = $ids[$i];
            $view = $views[$i];
            if (empty($creatorSums[$creator])) {
                $creatorSums[$creator] = [
                    'viewSum' => $view,
                    'maxView' => $view,
                    'maxViewId' => $videoId,
                ];
            } else {
                $creatorSums[$creator]['viewSum'] += $view;
                $replaceView = false;
                if ($view > $creatorSums[$creator]['maxView']) {
                    $replaceView = true;
                } else if ($view === $creatorSums[$creator]['maxView']) {
                    $idIndex = 0;
                    while (true) {
                        if (!isset($videoId[$idIndex])) {
                            $replaceView = true;
                            break;
                        }

                        if (!isset($creatorSums[$creator]['maxViewId'][$idIndex])) {
                            break;
                        }

                        $ordId = ord($videoId);
                        $ordMaxId = ord($creatorSums[$creator]['maxViewId']);
                        if ($ordId < $ordMaxId) {
                            $replaceView = true;
                            break;
                        }

                        if ($ordId > $ordMaxId) {
                            break;
                        }

                        $idIndex++;
                    }
                }

                if ($replaceView) {
                    $creatorSums[$creator]['maxView'] = $view;
                    $creatorSums[$creator]['maxViewId'] = $videoId;
                }
            }

            if ($creatorSums[$creator]['viewSum'] >= $currentMax) {
                if ($creatorSums[$creator]['viewSum'] > $currentMax) {
                    $currentMax = $creatorSums[$creator]['viewSum'];
                    $currentMaxCreators = [];
                }

                $currentMaxCreators[$creator] = $creatorSums[$creator]['maxViewId'];
            }
        }

        $result = [];
        foreach ($currentMaxCreators as $creator => $videoId) {
            $result[] = [$creator, $videoId];
        }

        return $result;
    }
}
