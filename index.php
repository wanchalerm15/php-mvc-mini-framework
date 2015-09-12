<?php

define("PATH_ROOT", dirname(__FILE__));
require_once 'autoload.php';
if (isset($_SERVER['PATH_INFO'])) {
    $path_info = explode('/', $_SERVER['PATH_INFO']);
    $controller_info = strtolower($path_info[1]);
    $controller_path = 'controllers/' . $controller_info . 'Controller.php';
    if (file_exists($controller_path)) {
        $controller_start = 'new ' . $controller_info . 'Controller();';
        eval($controller_start);
    } else {
        $error = array(
            'status' => 404,
            'debug' => 'Controller Not Found !'
        );
        exit(Configs::OutputError($error));
    }
    unset($controller_start, $path_info, $controller_info, $controller_path);
}



