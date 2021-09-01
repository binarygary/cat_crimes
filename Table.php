<?php


class Table
{

    /**
     * @var Cat[]
     */
    private $cats = [];

    public function __construct($cats)
    {
        $this->cats = $cats;
    }

    public function render()
    {
        /** example table
         *            Mr Mittens Pipsqueak
         * Ginger                          Tomcat
         *            Duchess    Sassy
         */

        echo '           ' . $this->padded_cat_name($this->cats[1]->name()) . ' ' . $this->padded_cat_name($this->cats[2]->name()) . PHP_EOL;
        echo $this->padded_cat_name($this->cats[0]->name()) . '                          ' . $this->padded_cat_name($this->cats[3]->name()) . PHP_EOL;
        echo '           ' . $this->padded_cat_name($this->cats[5]->name()) . ' ' . $this->padded_cat_name($this->cats[4]->name()) . PHP_EOL;

    }

    private function padded_cat_name( $cat_name ) {
        while ( strlen( $cat_name ) < 10 ) {
            $cat_name .= ' ';
        }

        return $cat_name;
    }

}