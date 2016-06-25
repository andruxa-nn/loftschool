<?php
//Старайся стилизовать код что он был читабильнее
$result = [
    'projectName' => PROJECT_NAME,
    'title'       => 'Войти на сайт',
    'isAdmin'     => isAdmin(),
];

$login   = ( !empty($_REQUEST['login'] )    ?  strip_tags($_REQUEST['login'])    : '');
$passowd = ( !empty($_REQUEST['password'] ) ?  strip_tags($_REQUEST['password']) : '');


if (
    isset( $_REQUEST['send'] ) &&
    ( $_REQUEST['send'] == 'Войти' )
) {
    if (
        ( LOGIN     == strtolower($login)) &&
        ( PASSWORD  == crypt($passowd, SALT))
    ) {
        $_SESSION['isAdmin'] = true;
        $result['success'][] = 'Авторизация прошла успешно!';
    } else {
        $result['error'][]   = 'Неверная пара Логин/Пароль.';
    }
} elseif (
    isset($_REQUEST['send']) &&
    ($_REQUEST['send'] == 'Выйти')
) {
    unset($_SESSION['isAdmin']);
    $result['success'][] = 'Вы успешно разавторизовались!';
}

return $result;
