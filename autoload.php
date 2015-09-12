<?php

$config = PATH_ROOT . '/config';
$directory = opendir($config);
while ($class = readdir($directory)) {
    if ($class != '.' && $class != '..') {
        require ($config . '/' . $class);
    }
}

$models = PATH_ROOT . '/models';
$directory = opendir($models);
while ($class = readdir($directory)) {
    if ($class != '.' && $class != '..') {
        require ($models . '/' . $class);
    }
}

$controllers = PATH_ROOT . '/controllers';
$directory = opendir($controllers);
while ($class = readdir($directory)) {
    if ($class != '.' && $class != '..') {
        require ($controllers . '/' . $class);
    }
}
unset($config, $directory, $models, $controllers);
