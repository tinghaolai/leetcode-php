<?php

class FoodRatings {
    /**
     * @param String[] $foods
     * @param String[] $cuisines
     * @param Integer[] $ratings
     */
    function __construct($foods, $cuisines, $ratings) {
        $this->ratings = [];
        $this->cuisineMapping = [];
        foreach ($foods as $index => $food) {
            if (!isset($this->ratings[$cuisines[$index]])) {
                $this->ratings[$cuisines[$index]] = [];
            }

            $this->ratings[$cuisines[$index]][$food] = $ratings[$index];
            $this->cuisineMapping[$food] = $cuisines[$index];
        }
    }

    /**
     * @param String $food
     * @param Integer $newRating
     * @return NULL
     */
    function changeRating($food, $newRating) {
        $cuisine = $this->cuisineMapping[$food];
        $this->ratings[$cuisine][$food] = $newRating;
    }

    /**
     * @param String $cuisine
     * @return String
     */
    function highestRated($cuisine) {
        $max = 0;
        $maxFood = null;
        foreach ($this->ratings[$cuisine] as $food => $rating) {
            if (
                $rating > $max ||
                ($rating === $max && $food < $maxFood)
            ) {
                $max = $rating;
                $maxFood = $food;
            }
        }

        return $maxFood;
    }
}

class Solution {
    function test() {
        new FoodRatings(
            ["kimchi", "miso", "sushi", "moussaka", "ramen", "bulgogi"],
            ["korean", "japanese", "japanese", "greek", "japanese", "korean"],
            [9, 12, 8, 15, 14, 7]
        );
    }
}

/**
 * Your FoodRatings object will be instantiated and called as such:
 * $obj = FoodRatings($foods, $cuisines, $ratings);
 * $obj->changeRating($food, $newRating);
 * $ret_2 = $obj->highestRated($cuisine);
 */

//FoodRatings foodRatings = new FoodRatings(
//    ["kimchi", "miso", "sushi", "moussaka", "ramen", "bulgogi"],
//    ["korean", "japanese", "japanese", "greek", "japanese", "korean"],
//    [9, 12, 8, 15, 14, 7]);

