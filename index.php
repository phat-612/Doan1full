<?php
    session_start();
    require 'Debug.php';
    require 'config.php';
    require 'Controllers/BaseController.php';
    require 'Models/BaseModel.php';
    // đặt các hằng toàn cục
    

    // định tuyến controller và action
    $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : 'home';
    $arrPath = array_values(array_filter(explode('/', $pathInfo)));
    $controllerName = ucfirst(strtolower(isset($arrPath[0]) ? $arrPath[0] : 'home')) . 'Controller';
    $actionName = isset($arrPath[1]) ? $arrPath[1] : 'index';
    require "Controllers/$controllerName.php";
    $controllerObject = new $controllerName;
    $controllerObject->$actionName();
?>