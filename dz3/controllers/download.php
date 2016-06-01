<?php

function getFile($fileName)
{
    if ($fileType = getFileType($fileName)) {
        $mime = explode('/', $fileType);
        $result = [
            'name' => $fileName,
            'type' => $mime[0],
            'format' => $mime[1]
        ];
        return $result;
    }
    return false;
}

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Скачать файл',
    'isAdmin' => 1,
];

if (isset($_REQUEST['file']) && $file = getFile($_REQUEST['file'])) {
    header('Content-type: ' . $file['type'] . '/' . $file['format']);
    header('Content-Disposition: attachment; filename="' . $file['name'] . '"');
    echo file_get_contents(FILES . $file['name']);
    exit();
}

return $result;