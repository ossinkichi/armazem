<?php

class DataBase{

    protected static $pdo;

    public function __construct() {
        self::connect();
    }

    private static function connect(){
        define('HOST','localhost');
        define('DBNAME','supermarket');
        define('NAME','root');
        define('PASSWORD','');

        try{

            self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME,NAME,PASSWORD);

        }catch(PDOException $errorPdo){
            echo $errorPdo->getMessage(). $errorPdo->getCode();
        }
    }

}