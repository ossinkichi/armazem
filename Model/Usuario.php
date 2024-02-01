<?php

class Usuario extends DataBase{

    public static function getUser($user){
        
        $dados = [];
        
        try {
            $sql = self::$pdo->prepare('SELECT * FROM users WHERE name = :n');
            $sql->bindValue(':n',$user);
            $sql->execute();
            

            $dados = $sql->fetchall(PDO::FETCH_ASSOC);
            return $dados;

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage(). $errorPdo->getCode();
        }

    }

}