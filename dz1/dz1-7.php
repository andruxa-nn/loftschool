<?php

/**
 * Задача No7
 * Создать ассоциативный массив $cars. Данные взять из задания No6. Требуется,
 * чтобы все данные были в одном массиве. Реализовать через вложенные массивы.
 * Вывести массив в удобочитаемом виде через конструкцию print_r и через foreach.
 */

$cars = [
    [
        'model' => 'X5',
        'speed' => 120,
        'doors' => 5,
        'year' => 2015
    ], [
        'model' => 'Corolla',
        'speed' => 100,
        'doors' => 4,
        'year' => 2002
    ], [
        'model' => 'Astra',
        'speed' => 115,
        'doors' => 4,
        'year' => 2008
    ]
];

echo '<pre>';
print_r($cars);
echo '</pre>';

foreach ($cars as $value) {
    foreach ($value as $index => $element) {
        echo  $index . ': ' . $element . "<br />\r";
    }
    echo "<br />\r";
}
