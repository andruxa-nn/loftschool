<?php

/**
 * Задача No5
 * Создайте переменную $day и присвойте ей произвольное числовое значение. С
 * помощью конструкции switch выведите фразу «Это рабочий день», если значение
 * переменной $day попадает в диапазон чисел от 1 до 5 (включительно). Выведите
 * фразу «Это выходной день», если значение переменной $day равно числам 6 или 7.
 * Во всех остальных случаях вывести «Неизвестный день».
 * Конструкцию switch написать в двух вариантах.
 */

$day = 6;

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
}
