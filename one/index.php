<?php

/**
 * Стоимости интервалов MMR
 * Элементы включают в себя максимальное значение интервала [max_mmr] (включительно) и стоимость за единицу [cost]
 * (За минимальное значение принимается предыдущее или 0 при его отсутствии)
 * Массив должен быть отсортирован по возрастанию [max_mmr]
 * 
 * @var Array
 */
$intervals = [
    0 => [
        'max_mmr' => 2500,
        'cost' => 1
    ],
    1 => [
        'max_mmr' => 3500,
        'cost' => 3
    ],
    2 => [
        'max_mmr' => 5500,
        'cost' => 5
    ],
    3 => [
        'max_mmr' => 7000,
        'cost' => 10
    ]
];

/**
 * Расчет стоимости диапазона MMR
 * 
 * @param  array    $intervals  Массив стоимостей интервалов
 * @param  int      $start      Начало интервала
 * @param  int      $end        Конец интервала
 * @param  int      $interval   (Необязательный) Начальный индекс интервала
 * @return int|bool             Стоимость или false при ошибке расчета
 */
function intervalCost($intervals, $start, $end, $interval = 0)
{
    $get_interval = $intervals[$interval] ?? false;

    if ($start > $end) {
        return false;
    }

    if ($get_interval === false ) {
        return 0;
    }

    if ($start <= $get_interval['max_mmr'] && $end > $get_interval['max_mmr']) {
        $cost = $get_interval['cost'] * ($get_interval['max_mmr'] - $start);
        return $cost + intervalCost($intervals, $get_interval['max_mmr'], $end, ++$interval);
    }

    if ($end <= $get_interval['max_mmr']) {
        return $get_interval['cost'] * ($end - $start);
    }

    if ($start > $get_interval['max_mmr']) {
        return intervalCost($intervals, $start, $end, ++$interval);
    }

    return 0;
}

$mmr_start = 500;
$mmr_end = 3400;

$cost = intervalCost($intervals, $mmr_start, $mmr_end);
echo $cost;
