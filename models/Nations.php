<?php

class Nations {

    public function FindAll() {
        $db = Database::Connect();
        $query = $db->prepare("select * from Nations");
        $query->execute();
        return Database::getResult($query, 1);
    }

    public function FindById($id) {
        $db = Database::Connect();
        $query = $db->prepare("select * from Nations where id=:id");
        $query->execute(array(":id" => $id));
        return Database::getResult($query);
    }

    public function Find(array $array) {
        $column = array_keys($array)[0];
        $value = array_values($array)[0];
        $db = Database::Connect();
        $query = $db->prepare("select * from Nations where $column=:value");
        $query->execute([':value' => $value]);
        return Database::getResult($query);
    }

    public function FindLike(array $array) {
        $column = array_keys($array)[0];
        $value = array_values($array)[0];
        $db = Database::Connect();
        $query = $db->prepare("select * from Nations where $column Like(:value)");
        $query->execute([':value' => $value]);
        return Database::getResult($query);
    }

}
