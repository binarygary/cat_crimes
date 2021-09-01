<?php


class Rule2 extends Rules
{

    public function validate(): bool
    {
        $long_hair_positions = [];
        $long_hair_left_of_bow = false;

        foreach ($this->cats as $cat_positon => $cat) {
            if ($cat->long_hair()) {
                $long_hair_positions[] = $cat_positon;
            }
        }

        foreach ($long_hair_positions as $long_hair_position) {

            if ($this->cat_to_right($long_hair_position)->bow()) {
                $long_hair_left_of_bow = true;
            }

        }

        return $long_hair_left_of_bow;
    }
}