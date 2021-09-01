<?php

class Rule1 extends Rules
{

    public function validate(): bool
    {
        $ginger_position = null;

        // Find the position of ginger
        foreach ($this->cats as $index => $cat) {
            if ('Ginger' == $cat->name()) {
                $ginger_position = $index;
            }
        }

        // Check the items before and after to see if that cat has a bow
        $before = $ginger_position - 1;
        $after = $ginger_position + 1;

        if ( $before <  0 ) {
            $before = 5;
        }

        if ( $after > 5 ) {
            $after = 0;
        }

        if ( ! $this->cats[ $before ]->bow()
            && ! $this->cats[ $after ]->bow() ) {
            return true;
        }

        return false;
    }
}