<?php

/**
 * Задача No9
 * Создайте переменную $str, которой присвойте строковое значение,
 * содержащее отдельные слова разделённые пробелом. Выведите строку на экран.
 * Затем разбейте строку на массив. Выведите массив. Затем используя циклы while
 * или do-while (на ваше усмотрение) развернуть массив и склеить в строку используя
 * любой символ, кроме пробела. Вывести результат.
 */

$str = 'Создайте переменную которой присвойте строковое значение содержащее отдельные слова разделённые пробелом.';

echo $str . "<br />\r";

$strArray = explode(' ', $str);

echo '<pre>';
print_r($strArray);
echo '</pre>';

$i = 0;
$newStr = '';
while ($i < count($strArray)) {
    $newStr .= $strArray[$i];
    $i++;
}

echo $newStr;
