<?php

namespace Test\Classes;

use Test\Interfaces\{IntervalsInterface, CalculatorInterface};

class Calculator implements CalculatorInterface
{
    private $intervals;
    private $start_mmr;
    private $end_mmr;

    public function __construct(IntervalsInterface $intervals)
    {
        $this->setIntervals($intervals);
    }

    /**
     * Устанавливает диапазоны интервалов
     * @param IntervalsInterface $intervals Список интервалов
     */
    public function setIntervals(IntervalsInterface $intervals)
    {
        $this->intervals = $intervals;
        return $this;
    }

    /**
     * Устанавливает вычисляемый диапазон
     * @param int $start Начало интервала
     * @param int $end   Конец интервала
     */
    public function setInterval($start, $end)
    {
        if ($start > $end) {
            throw new Exception("Неверно указан диапазон", 1);
        }
        $this->start_mmr = $start;
        $this->end_mmr = $end;
        return $this;
    }

    /**
     * Возвращает вычесленную стоимость диапазона или false при ошибке
     * @return int|bool
     */
    public function calc()
    {
        if (is_null($this->intervals))
            return false;

        $filtered = $this->intervals->filter($this->start_mmr, $this->end_mmr);
        $cost = 0;
        foreach ($filtered as $interval) {
            $interval_size = min($this->end_mmr, $interval['end']) - max($this->start_mmr, $interval['start']);
            $cost += $interval_size * $interval['cost'];
        }
        return $cost;
    }
}
