<?php

/**
 * Задача No7
 * Функция принимает 1 строковый параметр и возвращает TRUE, если строка
 * является палиндромом, FALSE в противном случае. Пробелы не должны учитываться.
 * Регистр не должен учитываться.
 * Палиндром – строка, одинаково читающаяся в обоих направлениях.
 * Дополнительно (не обязательно): Искала бы все палиндромы, в строке начиная с
 * трёх символов.
 */

function isPalindrome ($str) {
    if (gettype($str) != 'array') {
        $str = str_split(str_replace(' ', '', strtolower($str)));
    }
    if (array_shift($str) != array_pop($str)) {
        return false;
    } elseif ($str && (count($str) != 1)) {
        isPalindrome($str);
    }
    return true;
}

echo '<pre>';
print_r(isPalindrome('A rosa upala na lapu azora')); //Не работает, всегда выдает что палиндром
echo '</pre>';

function isPalindromes($str) {
    preg_match_all('~([[a-zA-Z])([a-zA-Z])[a-zA-Z]\2\1~i', $str, $matches1);
    preg_match_all('~([a-zA-Z])([a-zA-Z])([a-zA-Z])\3\2\1~i', $str, $matches2);
    return array_merge($matches1[0], $matches2[0]);
}

echo '<pre>';
print_r(isPalindromes('level, rotor, madam, redder, succus, terret'));
echo '</pre>';
