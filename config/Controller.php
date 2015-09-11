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
        } else {
            $error = array(
                'status' => 304,
                'debug' => 'System Agree Controller and Action'
            );
            exit(Configs::OutputError($error));
        }
    }

}
