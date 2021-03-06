<?php

checkAcess();

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Удалить файл',
    'isAdmin' => isAdmin(),
];

if (isset($_REQUEST['file']) && file_exists(FILES . $_REQUEST['file'])) {
    if (unlink(FILES . $_REQUEST['file'])) {
        $result['success'][] = 'Файл успешно удален!';
    } else {
        $result['error'][] = 'Ошибка удаления файла.';
    }
}

return $result;