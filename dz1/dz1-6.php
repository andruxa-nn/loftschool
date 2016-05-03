<?php

/**
 * Задача No6
 * Создайте массив $bmw с ячейками: model, speed, doors, year. Заполните ячейки
 * значениями соответственно: “X5”, 120, 5, “2015”. Создайте массивы $toyota и $opel
 * аналогичные массиву $bmw (заполните данными).
 * Выведите значения всех трёх массивов в виде:
 * Модель: model
 * Скорость: speed
 * Двери: doors
 * Год выпуска: year
 * Например:
 * Модель: X5
 * Скорость: 120
 * Двери: 5
 * Год выпуска: 2015
 */

$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => 2015
];

$toyota = [
    'model' => 'Corolla',
    'speed' => 100,
    'doors' => 4,
    'year' => 2002
];

$opel = [
    'model' => 'Astra',
    'speed' => 115,
    'doors' => 4,
    'year' => 2008
];

$cars = [$bmw, $toyota, $opel];

foreach ($cars as $value) {
    echo  'Модель: ' . $value['model'] . "<br />\r"
        . 'Скорость: ' . $value['speed'] . "<br />\r"
        . 'Двери: ' . $value['doors'] . "<br />\r"
        . 'Год выпуска: ' . $value['year'] . "<br />\r<br />\r";
}
