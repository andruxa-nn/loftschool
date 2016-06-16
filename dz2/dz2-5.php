<?php

/**
 * Задача No5
 * Функция должна принимать в качестве аргумента массив чисел и возвращать так
 * же массив, но отсортированный по возрастанию. Системные функции сортировки не
 * использовать.
 * Пример: В функцию передали [1, 22, 5, 66, 3, 57]. Вернула: [1, 3, 5, 22, 57, 66]
 * Дополнительно (не обязательно): Доработать функцию так, чтобы в качестве
 * второго аргумента она принимала название функции сортировки. И сортировала
 * массив с использованием этой функции. В идеале добавить 2 функции сортировки,
 * одна из которых должна быть задана по умолчанию.
 */

function mySort(array &$operands = [])
{
    foreach ($operands as $key => $value) {
        $current = $operands[$key];
        $next = @$operands[$key + 1]; //подавление ошибок недопустимо
        if (($current > $next) && $next) {
            array_splice($operands, $key, 2, [$next, $current]);
            mySort($operands);
        }
    }
    return $operands;
}

$a = [1, 22, 5, 66, 3, 57];

echo '<pre>';
print_r(mySort($a));
echo '</pre>';

function mySort1(array &$operands = [], $funcName = 'a')
{
    foreach ($operands as $key => $value) {
        $current = $operands[$key];
        $next = @$operands[$key + 1]; //подавление ошибок недопустимо
        if (call_user_func($funcName, $current, $next) && $next) {
            array_splice($operands, $key, 2, [$next, $current]);
            mySort1($operands, $funcName);
        }
    }
    return $operands;
}

function a($a, $b)
{
    return $a > $b;
}

function b($a, $b)
{
    return $a < $b;
}

echo '<pre>';
print_r(mySort1($a, 'a'));
echo '</pre><br />' . PHP_EOL;

echo '<pre>';
print_r(mySort1($a, 'b'));
echo '</pre><br />' . PHP_EOL;
