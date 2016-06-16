<?php

checkAcess();

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Скачать файл',
    'isAdmin' => isAdmin(),
];

if (
    isset($_REQUEST['file']) &&
    ($file = getFile($_REQUEST['file']))
) {
    header('Content-type: ' . $file['type'] . '/' . $file['format']);
    header('Content-Disposition: attachment; filename="' . $file['name'] . '"');
    echo file_get_contents(FILES . $file['name']);
    exit();
}

return $result;