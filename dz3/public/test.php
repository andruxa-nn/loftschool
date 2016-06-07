<?php

if ($_REQUEST['q'] == 1) {
    session_start();
    $_SESSION['user_id'] = 1;
} elseif ($_REQUEST['q'] == 2) {
    session_destroy();
}