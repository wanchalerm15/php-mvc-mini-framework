<?php

class Database {

    const host = "localhost";
    const database = "translate_project";
    const username = "root";
    const password = "";
    const charset = "utf8";

    public static function Connect() {
        try {
            return new PDO("mysql:host=" . self::host . ";dbname=" . self::database . ";charset=" . self::charset, self::username, self::password);
        } catch (Exception $exc) {
            $error = array(
                'status' => 504,
                'debug' => $exc->getMessage()
            );
            exit(Configs::OutputError($error));
        }
    }

    public static function getResult($query, $row_array = 0) {
        $error = $query->errorInfo();
        if ($error[0] == "00000") {
            if ($row_array != 0) {
                $array_datas = array();
                while ($row = $query->fetchObject()) {
                    $array_datas[] = $row;
                }
                return $array_datas;
            }
            return $query->fetchObject();
        }
        exit(Configs::OutputError($error));
    }

}
