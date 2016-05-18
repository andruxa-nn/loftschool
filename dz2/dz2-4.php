<?php

/**
 * Задача No4
 * Функция должна принимать два параметра – целые числа. Если в функцию
 * передали 2 целых числа, то функция должна отобразить таблицу умножения размером
 * со значения параметров, переданных в функцию. В остальных случаях выдавать
 * корректную ошибку.
 * Например: tabl(4,3), то функция должна нарисовать следующий результат:
 * 1 2 3 4
 * 2 4 6 8
 * 3 6 9 12
 * Дополнительно (не обязательно): Написать ещё одну функцию, которая бы
 * вызывала первую функцию с двумя случайными числами. Использовать генератор
 * случайных чисел.
 */

function tabl ($g, $m) {
    if (!(($g = (int)$g) > 0) || !(($m = (int)$m) > 0)) {
        die("Операнды должбы быть натуральными положительными числами!");
    }

    echo '<table border="1">';
    for ($a = 1, $b = 1; $a <= $g; $a++, $b = 1) {
        echo '<tr>';
        for ( ; $b <= $m; $b++) {
            echo '<td>' . $a * $b . '</td>';
        }
        echo '</tr>';
    }
    echo '</table><br /><br />';
}

tabl (2, 4);

function tablRand () {
    tabl(mt_rand(2, 10), mt_rand(2, 10));
}

tablRand ();
