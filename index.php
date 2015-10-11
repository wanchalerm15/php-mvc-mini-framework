<?php
header('Access-Control-Allow-Origin:*');
require_once 'autoload.php';
if (!empty(PATH_INFO)) 
{
    $path_info = explode('/', PATH_INFO);
    if(empty($path_info[0]) && empty($path_info[1]))
    {
        loadIndexController();
    }
    else
    {
        loadController();
    }
}
else
{
    loadIndexController();
}