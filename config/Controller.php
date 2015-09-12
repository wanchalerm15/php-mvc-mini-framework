<?php

class Controller {

    public function __construct() {
        $path_info = explode('/', $_SERVER['PATH_INFO']);
        if (count($path_info) === 2) {
            $this->Index();
        } elseif (count($path_info) === 3) {
            $action_path = FALSE;
            $action_info = strtolower($path_info[2]);
            $actions = get_class_methods($this);
            foreach ($actions as $action) {
                if (strtolower($action) === $action_info) {
                    $action_path = '$this->' . $action . '();';
                    break;
                }
            }
            if ($action_path != FALSE) {
                eval($action_path);
            } else {
                $error = array(
                    'status' => 404,
                    'debug' => 'Action Not Found !'
                );
                exit(Configs::OutputError($error));
            }
            unset($action_path, $action_info, $actions);
        } else {
            $error = array(
                'status' => 304,
                'debug' => 'System Agree Controller and Action'
            );
            exit(Configs::OutputError($error));
        }
    }

    protected function view($view = 'index', array $array_data = NULL) {
        $path_info = explode('/', $_SERVER['PATH_INFO']);
        $controller = $path_info[1];
        $view_path = PATH_ROOT . '/views/' . $controller . '/' . strtolower($view) . '.php';
        if (file_exists($view_path)) {
            if ($array_data != NULL) {
                $valiable = '';
                foreach ($array_data as $key => $value) {
                    $valiable .= '$' . $key . '=' . var_export($value, true) . ';';
                }
                eval($valiable);
            }
            require ($view_path);
            unset($valiable, $value);
        } else {
            $error = array(
                'status' => 404,
                'debug' => 'View Not Found !'
            );
            exit(Configs::OutputError($error));
        }
        unset($path_info, $controller, $view_path);
    }

}
