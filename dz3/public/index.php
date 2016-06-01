<?php

require_once '../startup.php';

$actions = ['main', 'read', 'create', 'upload', 'edit', 'download', 'delete'];

if (
    isset($_REQUEST['page']) &&
    in_array($_REQUEST['page'], $actions)
) {
    $page = $_REQUEST['page'];
} else {
    $page = 'main';
}

view($page, controller($page));
