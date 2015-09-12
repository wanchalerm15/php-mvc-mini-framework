<?php

define("PATH_ROOT", dirname(__FILE__));
require_once 'autoload.php';
if (isset($_SERVER['PATH_INFO'])) {
    $path_info = explode('/', $_SERVER['PATH_INFO']);
    $controller_info = strtolower($path_info[1]);
    $controller_path = 'controllers/' . $controller_info . 'Controller.php';
    if (file_exists($controller_path)) {
        $controller_path = PATH_ROOT . '/' . $controller_path;
        require_once ($controller_path);
        eval('new ' . $controller_info . 'Controller();');
        unset($path_info, $controller_info, $controller_path);
    } else {
        $error = array(
            'status' => 404,
            'debug' => 'Controller Not Found !'
        );
        exit(Configs::OutputError($error));
    }
}



