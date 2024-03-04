<?php

class Reports extends DataBase{

    public static function getReports(){

        try {
            
            $sql = self::$pdo->prepare('SELECT * FROM reports ORDER BY id DESC');
            $sql->execute();

            $dados = $sql->fetchall(PDO::FETCH_ASSOC);

            return $dados;

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getCode();
        }

    }

    public static function setReport($author,$report,$date,$code){
        try {
            
            $sql = self::$pdo->prepare('INSERT INTO reports(code,authorOfTheReport,report,reportDate) VALUES(:c,:a,:r,:d)');
            $sql->bindValue(':c',$code);
            $sql->bindValue(':a',$author);
            $sql->bindValue(':r',$report);
            $sql->bindValue(':d',$date);
            $sql->execute();

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }

}