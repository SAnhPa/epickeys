<?php

// require_once "app\Interfaces\IntervalsInterface.php";
// require_once "app\Interfaces\CalculatorInterface.php";
// require_once "app\Classes\Intervals.php";
// require_once "app\Classes\Calculator.php";

spl_autoload_register(function($className) {
    $path = explode('\\', $className);
    $path[0] = str_replace(BASE_NAMESPACE, 'app', $path[0]);
    require_once __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $path) . '.php';
});
