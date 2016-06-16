<?php

checkAcess();

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Редактировать файл',
    'isAdmin' => isAdmin(),
];

$fileBody = (!empty($_REQUEST['fileBody']) ? strip_tags($_REQUEST['fileBody']) : '');

if (isset($_REQUEST['send'])) {
    if (
        ($file = getFile($_REQUEST['file'])) &&
        $fileBody &&
        file_put_contents(FILES . $file['name'], $fileBody)
    ) {
        $result['success'][] = 'Файл успешно отредактирован!';
    } else {
        $result['error'][] = 'Ошибка редактирования файла.';
    }
}

if (
    isset($_REQUEST['file']) &&
    ($file = getFile($_REQUEST['file']))
) {
    $result['title'] .= ' ' . $file['name'];
    $result['file'] = $file;
}

return $result;
