<?php
require_once "models/Model.php";

class Staff extends Model{
    public function insert($datas = []){
        $sql_insert = "INSERT INTO employees (name, description, gender, salary, birthday) VALUES (:name, :description, :gender, :salary, :birthday)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':name' => $datas['name'],
            ':description' => $datas['description'],
            ':gender' => $datas['gender'],
            ':salary' => $datas['salary'],
            ':birthday' => $datas['birthday']
        ];
        return $obj_insert->execute($inserts);
    }
}