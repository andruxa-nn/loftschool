<?php

/**
 * Задача No3
 * Функция должна принимать переменное число аргументов, но первым
 * аргументом обязательно должна быть строка, обозначающая арифметическое
 * действие, которое необходимо выполнить со всеми передаваемыми аргументами.
 * Остальные аргументы целые и/или вещественные.
 * Например: имя функции someFunction(‘+’, 1, 2, 3, 5.2);
 * Результат: 1 + 2 + 3 + 5.2 = 11.2
 * Дополнительно (не обязательно): Задание взять из Задачи №2.
 */

function someFunction ($operation = '+', $operand1 = 2, $operand2 = 4) {
    $args = func_get_args();
    echo eval('return ' . implode($operation, array_slice($args, 1)) . ';') . '<br />' . PHP_EOL;
}

someFunction ('+', 1, 3, 5);

function someFunction1 (array $operation = ['+'], $operand1 = 2, $operand2 = 4) {
    $args = func_get_args();
    $operands = array_slice($args, 1);

    if (count($operands) < 2) {
        die('Количество операндов должно быть больше 1!');
    }

    foreach ($operands as $value) {
        if (!in_array(gettype($value), ['integer', 'double'])) {
            die("Не допустимый тип операнда (" . gettype($value) . ') ' . $value . "!");
        }
    }

    foreach ($operation as $value) {
        if (!in_array($value, ['+', '-', '*', '/', '%', '**'])) {
            die("Не допустимая арифметическая операция " . $value . "!");
        }
    }

    foreach ($operation as $value) {
        echo eval('return ' . implode($value, $operands) . ';') . '<br />' . PHP_EOL;
    }
}

someFunction1 (['*', '/', '+', '-'], 1, 3, 5);
