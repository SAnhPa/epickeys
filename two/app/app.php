<?php

namespace Test;

use Test\Classes\{Intervals, Calculator};

$intervals = new Intervals;
$intervals
    ->add(0, 2500, 1)
    ->add(2500, 3500, 3)
    ->add(3500, 5500, 5)
    ->add(5500, 7000, 10);

$calculator = new Calculator($intervals);

$calculator->setInterval(1500, 4200);
echo $calculator->calc();
