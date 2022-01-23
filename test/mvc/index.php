<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'staff';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = ucwords($controller);
$controller .= "Controller";
$controller_path = "controllers/$controller.php";

if (!file_exists($controller_path)) {
    die("File not found - 404");
}
require_once "$controller_path";

$obj = new $controller();

if (!method_exists($obj, $action)) {
    die("$action method does not exist in $controller controller");
}

$obj->$action();

