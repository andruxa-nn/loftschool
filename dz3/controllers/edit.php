<?php

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Редактировать файл',
    'isAdmin' => 1,
];

if (
    (isset($_REQUEST['fileBody']) && isset($_REQUEST['send'])) &&
    ($_REQUEST['send'] == 'Редактировать') &&
    ($file = getFile($_REQUEST['file']))
) {
    if (file_put_contents(FILES . $file['name'], strip_tags($_REQUEST['fileBody']))) {
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
