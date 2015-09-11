<?php

$config = 'config';
$directory = opendir($config);
while ($class = readdir($directory)) {
    if ($class != '.' && $class != '..') {
        require $config . '/' . $class;
    }
}

$models = 'models';
$directory = opendir($models);
while ($class = readdir($directory)) {
    if ($class != '.' && $class != '..') {
        require $models . '/' . $class;
    }
}

$controllers = 'controllers';
$directory = opendir($controllers);
while ($class = readdir($directory)) {
    if ($class != '.' && $class != '..') {
        require $controllers . '/' . $class;
    }
}
unset($config, $directory, $models, $controllers);
