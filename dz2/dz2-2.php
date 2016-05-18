<?php

/**
 * Задача No2
 * Функция должна принимать 2 параметра: а) массив чисел; б) строку,
 * обозначающую арифметическое действие, которое нужно выполнить со всеми
 * элементами массива. Функция должна вывести результат.
 * Например: имя функции someFunction(array(1,2,3,4), ‘ – ’);
 * Результат: 1 – 2 – 3 – 4 = 8
 * Дополнительно (не обязательно): Написать все, на Ваш взгляд, требуемые
 * проверки. Сделать по умолчанию любую арифметическую операцию. И сделать
 * возможность приём не только одного арифметического действия, но и массив
 * действий. И сколько заданных действий будет, столько и должно быть выведено
 * результатов.
 */

function someFunction (array $operands = [2, 2], $operation = '+') {
    echo eval('return ' . implode($operation, $operands) . ';') . '<br />' . PHP_EOL;
}

someFunction ([1, 3, 5], '+');

function someFunction1 (array $operands = [2, 2], array $operation = ['+']) {
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

someFunction1 ([1, 3, 5], ['*', '/', '+', '-']);
