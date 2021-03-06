<?php

/**
 * Задача No1
 * Реализовать следующий функционал:
 * 1. На странице находится список файлов, которые находятся в специальной
 * директории вашего приложения (например: files). Каждый файл в списке
 * является ссылкой;
 * 2. При клике на ссылку с названием файла, открывается страница, на которой
 * можно просмотреть текст данного файла;
 * 3. На странице со списком файлов, напротив названия каждого файла
 * имеются ссылки, которые ведут на страницы редактирования, скачивания и
 * удаления файлов;
 * 4. На самом верху страницы также имеется ссылка, которая ведёт на страницу
 * создания нового файла. На ней вы можете указывать имя будущего файла,
 * а также ввести содержимое файла;
 * 5. Рядом со ссылкой на страницу создания нового файла будет находиться
 * ссылка на страницу загрузки файла на сервер, т.е. на странице будет
 * находиться форма для загрузки текстовых файлов в папку с вашими
 * файлами. Данная форма должна содержать проверку на тип загружаемого
 * файла и размер (загружаемый файл не может весить больше 2 МБ).
 * В вашем проекте должны быть следующие страницы:
 * 1. Главная;
 * 2. Просмотреть содержимое файла;
 * 3. Создать файл;
 * 4. Загрузить файл;
 * 5. Редактировать файл;
 * 6. Скачать файл;
 * 7. Удалить файл.
 * Примечание:
 * Работа текстовыми файлами (расширение .txt)
 * Усложнения (дополнительно, по желанию):
 * 1. Дополнить тип загружаемых файлов картинками и разделить работу с
 * загруженными и созданными файлами. Страница редактирования только для
 * созданных файлов, а страница просмотра должна сама определить тип
 * показываемого файла.
 * 2. Использование сессий. Сделать доступ к функционалу по паролю. Без пароля
 * только просмотр списка файлов.
 */

session_start();

define('DOCUMENT_ROOT', __DIR__);
define('CONTROLLERS',   DOCUMENT_ROOT . '/controllers/');
define('RESOURCES',     DOCUMENT_ROOT . '/resources/');
define('FILES',         DOCUMENT_ROOT . '/files/');
define('PUBLIC',        DOCUMENT_ROOT . '/public/');
define('PROJECT_NAME',  'Редактор файлов');
define('LOGIN',  'admin');
define('PASSWORD',  'HlpgldY6sqvYQ');
define('SALT', 'HlWGdBN9sqjf9GrO5JEt');

function view($nameTemplate, array $variables = [])
{
    $templPath = RESOURCES . $nameTemplate . '.php';
    if (file_exists($templPath)) {
        extract($variables);
        include_once $templPath;
    }
}

function controller($nameController)
{
    $controllerPath = CONTROLLERS . $nameController . '.php';
    if (file_exists($controllerPath)) {
        return include_once $controllerPath;
    }
    return false;
}

function getFileType($fileName)
{
    $filePath = FILES . $fileName;
    if (is_file($filePath)) {
        return mime_content_type($filePath);
    }
    return false;
}

function getFile($fileName)
{
    if ($fileType = getFileType($fileName)) {
        $mime = explode('/', $fileType);
        $result = [
            'name' => $fileName,
            'type' => $mime[0],
            'format' => $mime[1]
        ];
        if ($result['type'] == 'text') {
            $result['text'] = file_get_contents(FILES . $result['name']);
        }
        return $result;
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

function isAdmin()
{
    return isset($_SESSION['isAdmin']);
}

function checkAcess()
{
    if (!isAdmin()) {
        die('Доступ к данному разделу запрещен!');
    }
}

$days = [
    1 => 'понедельник',
    2 => 'вторник',
    3 => 'среда',
    4 => 'четверг',
    5 => 'пятница',
    6 => 'суббота',
    7 => 'воскресенье',
];

$mounts = [
    1 => 'января',
    2 => 'февраля',
    3 => 'марта',
    4 => 'апреля',
    5 => 'мая',
    6 => 'июня',
    7 => 'июля',
    8 => 'августа',
    9 => 'сентября',
    10 => 'октября',
    11 => 'ноября',
    12 => 'декабря'
];
