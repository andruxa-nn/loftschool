<?php

checkAcess();

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Создать файл',
    'isAdmin' => isAdmin(),
];

$fileName = (!empty($_REQUEST['fileName']) ? strip_tags($_REQUEST['fileName']) : '');
$fileBody = (!empty($_REQUEST['fileBody']) ? strip_tags($_REQUEST['fileBody']) : '');

if (isset($_REQUEST['send'])) {
    if ($fileName &&
        $fileBody &&
        file_put_contents(FILES . getValidName($fileName . '.txt'), $fileBody)
    ) {
        $result['success'][] = 'Файл успешно создан!';
    } else {
        $result['file']['name'] = $fileName;
        $result['file']['text'] = $fileBody;
        $result['error'][] = 'Ошибка создания файла.';
    }
}

return $result;
