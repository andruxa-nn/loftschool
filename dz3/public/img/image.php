<?php

include_once '../../startup.php';

if (
    isset($_REQUEST['image']) &&
    ($file = getFile($_REQUEST['image']))
) {
    header('Content-type: ' . $file['type'] . '/' . $file['format']);
    echo file_get_contents(FILES . $file['name']);
} else {
    header('HTTP/1.0 404 Not Found');
}
