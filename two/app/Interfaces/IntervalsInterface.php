<?php

namespace Test\Interfaces;

interface IntervalsInterface
{
    public function add($start, $end, $cost);
    public function filter($start, $end);
}
