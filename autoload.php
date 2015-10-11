<?php
$SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
$REQUEST_URI = $_SERVER['REQUEST_URI'];
if(!strpos($REQUEST_URI, 'index.php')){
	$SCRIPT_NAME = str_replace('/index.php', '', $SCRIPT_NAME);
}
define("PATH_ROOT", dirname(__FILE__));
define('PATH_INFO', str_replace($SCRIPT_NAME, '', $REQUEST_URI));

$config = PATH_ROOT . '/config';
$array_continue = array(
	'.',
	'..',
	'.DS_Store'
);
$directory = opendir($config);
while ($class = readdir($directory)) {
	if(in_array($class , $array_continue)){
		continue;
	}
   	require($config . '/' . $class);
}

$models = PATH_ROOT . '/models';
$directory = opendir($models);
while ($class = readdir($directory)) {
    if(in_array($class , $array_continue)){
		continue;
	}
   	require($models . '/' . $class);
}

$controllers = PATH_ROOT . '/controllers';
$directory = opendir($controllers);
while ($class = readdir($directory)) {
    if(in_array($class , $array_continue)){
		continue;
	}
   	require($controllers . '/' . $class);
}
unset($config, $directory, $models, $controllers, $SCRIPT_NAME, $PATH_INFO);

function loadController()
{
 	$path_info = explode('/', PATH_INFO);
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

function loadIndexController()
{
	$controller_path = 'controllers/indexController.php';
    if (file_exists($controller_path)) {
        new indexController();
    } else {
        $error = array(
            'status' => 404,
            'debug' => 'Please Create indexController to '.PATH_ROOT.'\controllers'
        );
        exit(Configs::OutputError($error));
    }
    unset($controller_path);
}