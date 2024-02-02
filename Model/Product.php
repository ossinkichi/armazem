<?php

class Product extends DataBase{

    public static function getProduto(){

        $dados = [];

        try {
            
            $sql = self::$pdo->prepare('SELECT id,name_product, price, em_estoque,saida, entrada FROM estoque');
            $sql->execute();

            $dados = $sql->fetchall(PDO::FETCH_ASSOC);

            return $dados;

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }

    }

    public static function getEstoque($id){
        try {
            
            $sql = self::$pdo->prepare('SELECT em_estoque,entrada,saida FROM estoque WHERE id = :id');
            $sql->bindValue(':id',$id);
            $sql->execute();

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            return $dados;

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function addEstoque($id){
        try {

            $dado = self::getEstoque($id);
            $dado['entrada']    += 1;
            $dado['em_estoque'] += 1;
            
            $sql = self::$pdo->prepare('UPDATE estoque SET em_estoque = :em, entrada = :e WHERE estoque.id = :id');
            $sql->bindValue(':e',$dado['entrada']);
            $sql->bindValue(':em',$dado['em_estoque']);
            $sql->bindValue(':id',$id);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function removeEstoque($id){
        try {

            $dado = self::getEstoque($id);
            $dado['saida']          += 1;
            $dado['em_estoque']     -= 1;
            
            $sql = self::$pdo->prepare('UPDATE estoque SET em_estoque = :em, saida = :s WHERE estoque.id = :id');
            $sql->bindValue(':s',$dado['saida']);
            $sql->bindValue(':em',$dado['em_estoque']);
            $sql->bindValue(':id',$id);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function newProduto($name,$price,$estoque) {
        try {
            
            $sql = self::$pdo->prepare('INSERT INTO estoque(name_product,price,em_estoque) VALUE(:np,:p,:e)');
            $sql->bindValue(':np',$name);
            $sql->bindValue(':p',$price);
            $sql->bindValue(':e',$estoque);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }



}