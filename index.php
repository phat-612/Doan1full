<?php
    session_start();
    require 'Debug.php';
    require 'Controllers/BaseController.php';
    require 'Models/BaseModel.php';
    // inmang(__DIR__);
    // $GLOBALS['rootPath'] = array_values(array_filter(explode('/',  $_SERVER['PHP_SELF'])))[0];
    // đặt các hằng toàn cục
    $documentRoot = $_SERVER['DOCUMENT_ROOT'];
    $dirRoot = str_replace('\\', '/',  __DIR__);
    $webRoot = 'http://localhost/'.str_replace($documentRoot, '', $dirRoot);
    define('_DIR_ROOT', __DIR__);
    define('_WEB_ROOT', $webRoot);

    // định tuyến controller và action
    $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : 'home';
    $arrPath = array_values(array_filter(explode('/', $pathInfo)));
    $controllerName = ucfirst(strtolower(isset($arrPath[0]) ? $arrPath[0] : 'home')) . 'Controller';
    $actionName = isset($arrPath[1]) ? $arrPath[1] : 'index';
    require "Controllers/$controllerName.php";
    $controllerObject = new $controllerName;
    $controllerObject->$actionName();
?>