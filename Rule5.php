<?php


class Rule5 extends Rules
{

    public function validate(): bool
    {
        // Get the cats with bows
        $cats_with_bows_positions = [];
        $cat_with_bow_3_seats_from_stripes_left_of_cat_with_white_paws = false;

        foreach ($this->cats as $cat_positon => $cat) {
            if ($cat->bow()) {
                $cats_with_bows_positions[] = $cat_positon;
            }
        }

        foreach ($cats_with_bows_positions as $cat_with_bow_position) {
            $three_positions_has_bow = $this->three_positions($cat_with_bow_position)->stripes();
            $right_cat_has_white_paws = ('white' == $this->cat_to_right($cat_with_bow_position)->paw_color() );

            if ($three_positions_has_bow && $right_cat_has_white_paws) {
                $cat_with_bow_3_seats_from_stripes_left_of_cat_with_white_paws = true;
            }
        }

        return $cat_with_bow_3_seats_from_stripes_left_of_cat_with_white_paws;
    }
}