<?php

namespace Test\Interfaces;

use Test\Interfaces\IntervalsInterface;

interface CalculatorInterface
{
    public function setIntervals(IntervalsInterface $intervals);
    public function setInterval($start, $end);
    public function calc();
}
