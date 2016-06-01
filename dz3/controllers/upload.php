<?php

function uploadFile(&$result)
{
    if (!is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        $result['error'][] = 'Файл не был загружен при помощи HTTP POST';
    }

    if ($_FILES['userfile']['size'] > 2 * 1024 * 1024) {
        $result['error'][] = 'Размер файла не должен превышать 2 Mb';
    }

    if (!preg_match('/^(image|text)\//', $_FILES['userfile']['type'])) {
        $result['error'][] = 'Тип файла может быть изображением или текстом!';
    }

    if (empty($result['error'])) {
        return copy(
            $_FILES['userfile']['tmp_name'],
            FILES . getValidName($_FILES['userfile']['name'])
        );
    }
    return false;
}

function getValidName($name)
{
    if (file_exists(FILES . $name)) {
        return time() . '-' . $name;
    } else {
        return $name;
    }
}

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Загрузить файл',
    'isAdmin' => 1
];

if (isset($_FILES['userfile'])) {
    if (uploadFile($result)) {
        $result['success'][] = 'Файл успешно загружен!';
    } else {
        $result['error'][] = 'Ошибка загрузки файла.';
    }
}

return $result;
