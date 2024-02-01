<?php

class Reports extends DataBase{

    public function getReports(){

        try {
            
            $sql = self::$pdo->prepare('SELCT * FROM repot');
            $sql->execute();

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            return $dados;

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getCode();
        }

    }

}