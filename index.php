<?php
session_start();
require_once "core/config.php";
require_once "core/MainController.php";
require_once "core/FileController.php";
require_once "core/View.php";
require_once "models/SimpleImage.php";
require_once "models/Users.php";
require_once "libs/Eloquent/config.php";

$routes = explode('/', $_SERVER['REQUEST_URI']);
$controller_name = "Main";
$action_name = 'index';
if (!empty($routes[1])) {
    $controller_name = $routes[1];
}
if (!empty($routes[2])) {
    $action_name = $routes[2];
}
$filename = "controllers/" . strtolower($controller_name) . ".php";
try {
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception("File not found");
    }
    $classname = '\App\\' . ucfirst($controller_name);

    if (class_exists($classname)) {
        $controller = new $classname();
    } else {
        throw new Exception("File found but class not found");
    }
    if (method_exists($controller, $action_name)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action_name = 'post';
        }
        $controller->$action_name();
    } else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require "errors/404.php";
}

