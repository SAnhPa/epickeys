<?php

namespace Test\Classes;

use Test\Interfaces\IntervalsInterface;

class Intervals implements IntervalsInterface
{
    private $intervals;

    /**
     * Добавляет интервал
     * @param int $start Начало интервала
     * @param int $end   Конец интервала
     * @param int $cost  Стоимость
     */
    public function add($start, $end, $cost)
    {
        if ($start > $end) {
            throw new Exception("Неверно указан диапазон", 1);
        }

        $this->intervals[] = [
            'start' => $start,
            'end' => $end,
            'cost' => $cost
        ];
        return $this;
    }

    /**
     * Возвращает список интервалов пересекающиеся с указанным
     * @param  int  $start  Начало интервала
     * @param  int  $end    Конец интервала
     * @return array        Список интервалов
     */
    public function filter($start, $end)
    {
        $intervals = [];
        foreach ($this->intervals as $interval) {
            if ($start < $interval['end'] && $end > $interval['start']) {
                $intervals[] = $interval;
            }
        }
        return $intervals;
    }
}
