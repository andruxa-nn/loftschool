<?php

function getFile($fileName)
{
    if ($fileType = getFileType($fileName)) {
        $result = [
            'name' => $fileName,
            'type' => explode('/', $fileType)[0]
        ];
        if ($result['type'] == 'text') {
            $result['body'] = file_get_contents(FILES . $fileName);
        }
        return $result;
    }
    return false;
}

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Просмотр файла',
    'isAdmin' => 1,
];

if (!empty($_REQUEST['file'])) {
    $result['title'] .= ' ' . (string)$_REQUEST['file'];
    $result['file'] = getFile((string)$_REQUEST['file']);
}

return $result;
