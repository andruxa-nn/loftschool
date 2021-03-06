<?php

/**
 * Задача No1
 * Функция должна принимать массив строк и выводить каждую строку в отдельном
 * параграфе.
 * Примечание: Теги параграфа <p></p>.
 * Дополнительно (не обязательно): При выводе каждую строку выводить внутри
 * параграфа случайное число раз.
 */

$a = ['выводить', 'каждую', 'строку', 'в', 'отдельном', 'параграфе'];

function render(array $strings)
{
    foreach ($strings as $value) {
        echo '<p>' . str_repeat($value . ' ', rand(1, 5)) . '</p>' . PHP_EOL;
    }
}

render($a);
