<?php

abstract class Rules
{

    /**
     * @var Cat[]
     */
    protected $cats = [];

    function __construct($cats)
    {
        $this->cats = $cats;
    }

    abstract public function validate(): bool;

    public function across($position): Cat
    {
        $positions = [
            0 => 3,
            1 => 5,
            2 => 4,
            3 => 0,
            4 => 2,
            5 => 1,
        ];

        return $this->cats[$positions[$position]];
    }

    public function cat_to_right($position): Cat
    {
        $right_position = $position - 1;
        if ($right_position < 0) {
            $right_position = 5;
        }

        return $this->cats[$right_position];
    }

    public function cat_to_left($position): Cat
    {
        $left_postion = $position + 1;
        if ($left_postion > 5) {
            $left_postion = 0;
        }

        return $this->cats[$left_postion];
    }

    public function three_positions($position): Cat
    {
        if ($position < 3) {

            $three = $position + 3;
        } else {
            $three = $position - 3;
        }

        return $this->cats[$three];
    }
}