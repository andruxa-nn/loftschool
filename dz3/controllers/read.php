<?php

checkAcess();

$result = [
    'projectName' => PROJECT_NAME,
    'title' => 'Просмотр файла',
    'isAdmin' => isAdmin(),
];

if (
    isset($_REQUEST['file']) &&
    ($file = getFile($_REQUEST['file']))
) {
    $result['title'] .= ' ' . $file['name'];
    $result['file'] = $file;
}

return $result;
