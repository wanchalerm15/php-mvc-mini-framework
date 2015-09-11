<?php

class Configs {

    public static function OutputError($error, $type = 'json') {
        $return = NULL;
        switch ($type) {
            case 'json':
                $return = json_encode($error);
                break;
            case 'array':
                $return = $error;
                break;
            default :
                $return = '<pre>' . print_r($error, TRUE) . '</pre>';
                break;
        }
        return $return;
    }

}
