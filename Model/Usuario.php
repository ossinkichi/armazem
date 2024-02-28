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

    public static function getUsers(){
        
        $dados = [];
        
        try {
            $sql = self::$pdo->prepare('SELECT * FROM users WHERE accessLevel != 0');
            $sql->execute();
            

            $dados = $sql->fetchall(PDO::FETCH_ASSOC);
            return $dados;

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage(). $errorPdo->getCode();
        }

    }

    public static function perfil($id){

        $dados = [];
        
        try {
            $sql = self::$pdo->prepare('SELECT * FROM users WHERE id = :id');
            $sql->bindValue(':id',$id);
            $sql->execute();
            

            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            return $dados;

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage(). $errorPdo->getCode();
        }


    }

    public static function setNewUser($name,$password,$dateOfBirth,$gender,$mail,$phone,$accessLevel){
        try {
            
            $sql = self::$pdo->prepare('INSERT INTO users(name,password,dateOfBirth,gender,email,phone,accessLevel) VALUE(:n,:pa,:dob,:g,:e,:ph,:al)');
            $sql->bindValue(':n',$name);
            $sql->bindValue(':pa',$password);
            $sql->bindValue(':dob',$dateOfBirth);
            $sql->bindValue(':g',$gender);
            $sql->bindValue(':e',$mail);
            $sql->bindValue(':ph',$phone);
            $sql->bindValue(':al',$accessLevel);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }

    public static function desativar($id) {
        try {
            
            $sql = self::$pdo->prepare('UPDATE users SET status = "desativado" WHERE users.id = :id');
            $sql->bindValue(':id',$id);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }

    public static function ativar($id) {
        try {
            
            $sql = self::$pdo->prepare('UPDATE users SET status = "Ativo" WHERE users.id = :id');
            $sql->bindValue(':id',$id);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }

}