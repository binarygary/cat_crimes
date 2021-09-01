<?php


class Rule4 extends Rules
{

    public function validate(): bool
    {
        // Get the cats with bows
        $cats_with_bows_positions = [];
        $cat_with_bow_across_from_bell_right_of_stripes = false;

        foreach ($this->cats as $cat_positon => $cat) {
            if ($cat->bow()) {
                $cats_with_bows_positions[] = $cat_positon;
            }
        }

        foreach ($cats_with_bows_positions as $cat_with_bow_position) {
            $across_has_bell = $this->across($cat_with_bow_position)->bell();
            $left_cat_has_stripes = $this->cat_to_left($cat_with_bow_position)->stripes();

            if ( $across_has_bell && $left_cat_has_stripes ) {
                $cat_with_bow_across_from_bell_right_of_stripes = true;
            }
        }

        return $cat_with_bow_across_from_bell_right_of_stripes;
    }
}