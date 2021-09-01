<?php


class Rule3 extends Rules
{

    public function validate(): bool
    {
        // Get the long hair cats
        $long_hair_positions = [];
        $no_long_hair_across_from_blue_eyes = true;

        foreach ($this->cats as $cat_positon => $cat) {
            if ($cat->long_hair()) {
                $long_hair_positions[] = $cat_positon;
            }
        }

        // Check across to see if has blue eyes
        foreach ( $long_hair_positions as $long_hair_position ) {
            if ( 'blue' == $this->across( $long_hair_position )->eye_color() ) {
                $no_long_hair_across_from_blue_eyes = false;
            }
        }

        return $no_long_hair_across_from_blue_eyes;
    }
}