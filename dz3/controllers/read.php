<?php

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Просмотр файла',
    'isAdmin' => 1,
];

if (
    isset($_REQUEST['file']) &&
    ($file = getFile($_REQUEST['file']))
) {
    $result['title'] .= ' ' . $file['name'];
    $result['file'] = $file;
}

return $result;
