<?php

class Reports extends DataBase{

    public static function getReports(){

        try {
            
            $sql = self::$pdo->prepare('SELECT * FROM repot');
            $sql->execute();

            $dados = $sql->fetchall(PDO::FETCH_ASSOC);

            return $dados;

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getCode();
        }

    }

}