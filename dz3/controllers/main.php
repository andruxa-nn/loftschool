<?php

function getFiles()
{
    if ($handle = opendir(FILES)) {
        $result = [];
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            $type = explode('/', getFileType($file))[0];
            if (in_array($type, ['text', 'image'])) {
                $result[$i]['name'] = $file;
                $result[$i]['type'] = $type;
            }
            $i++;
        }
        closedir($handle);
        return $result;
    }
    return false;
}

return [
    'projectName' => PROJECT_NAME,
    'title' => 'Просмотр файлов',
    'isAdmin' => 1,
    'files' => getFiles(),
];
