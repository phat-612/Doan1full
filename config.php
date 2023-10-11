<?php
    // cấu hình database
    define('HOST_DB', 'localhost');
    define('USER_DB', 'root');
    define('PW_DB', '');
    define('NAME_DB', 'do_an_1');
    // các hằng toàn web
    $documentRoot = $_SERVER['DOCUMENT_ROOT'];
    $dirRoot = str_replace('\\', '/',  __DIR__);
    $webRoot = 'http://localhost'.str_replace($documentRoot, '', $dirRoot);
    define('_DIR_ROOT', __DIR__);
    define('_WEB_ROOT', $webRoot);
?>