<?php

namespace App;

class Connection {

    public static function getDb() {
        try {
            $conn = new \PDO(
                "mysql:host=localhost;dbname=controle_despesas;charset=utf8",
                "root",
                ""
            );
            return $conn;
        } catch (PDOException $erro) {
            //..tratar de alguma forma../
        }
    }
}



?>