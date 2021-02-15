<?php

namespace APP\Model;
use PDO;

class mysql{
    public static $pdo;

    public static function con(){
        if(Self::$pdo == null){
            try {
                Self::$pdo = new PDO('mysql: host='.pdo['host'].';dbname='.pdo['db'], pdo['login'], pdo['password']);
                Self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Servidor fora do ar";
            }
        }
        return Self::$Pdo;
    }
}