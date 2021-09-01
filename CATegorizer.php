<?php

require 'Cat.php';
require 'Duchess.php';
require 'Ginger.php';
require 'MrMittens.php';
require 'Pipsqueak.php';
require 'Sassy.php';
require 'Tomcat.php';

require 'Rules.php';
require 'Rule1.php';
require 'Rule2.php';
require 'Rule3.php';
require 'Rule4.php';
require 'Rule5.php';

require 'Table.php';

$cats = [
    new Duchess(),
    new Ginger(),
    new MrMittens(),
    new Pipsqueak(),
    new Sassy(),
    new Tomcat(),
];

$iterations = 0;

// Infinite loop
while (1 == 1) {

    $iterations++;

    shuffle( $cats );

    $rules = [
        new Rule1($cats),
        new Rule2($cats),
        new Rule3($cats),
        new Rule4($cats),
        new Rule5($cats),
    ];

    $valid = true;

    foreach ($rules as $rule) {
        if (!$rule->validate()) {
            $valid = false;
            break;
        }
    }

    if (!$valid) {
        continue;
    }

    echo $iterations . PHP_EOL;

    $table = new Table($cats);
    $table->render();

    die;
}