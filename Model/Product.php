<?php

class Product extends DataBase{

    public static function getProduto(){

        $dados = [];

        try {
            
            $sql = self::$pdo->prepare('SELECT * FROM products');
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

    public static function addEstoque($id,$quant){
        try {

            $dado = self::getEstoque($id);
            $dado['entrada']    += $quant;
            $dado['em_estoque'] += $quant;
            
            $sql = self::$pdo->prepare('UPDATE estoque SET em_estoque = :em, entrada = :e WHERE estoque.id = :id');
            $sql->bindValue(':e',$dado['entrada']);
            $sql->bindValue(':em',$dado['em_estoque']);
            $sql->bindValue(':id',$id);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function removeEstoque($id,$quant){
        try {

            $dado = self::getEstoque($id);
            $dado['saida']          += $quant;
            $dado['em_estoque']     -= $quant;
            
            $sql = self::$pdo->prepare('UPDATE estoque SET em_estoque = :em, saida = :s WHERE estoque.id = :id');
            $sql->bindValue(':s',$dado['saida']);
            $sql->bindValue(':em',$dado['em_estoque']);
            $sql->bindValue(':id',$id);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function newProduto($code,$name,$price,$estoque,$category) {
        try {
            
            $sql = self::$pdo->prepare('INSERT INTO products(code,name,price,inStock,category) VALUE(:cd,:np,:p,:e,:c)');
            $sql->bindValue(':cd',$code);
            $sql->bindValue(':np',$name);
            $sql->bindValue(':p',$price);
            $sql->bindValue(':e',$estoque);
            $sql->bindValue(':c',$category);
            $sql->execute();

        } catch (\PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }

    public static function getCategories(){

        try {
            
            $sql = self::$pdo->prepare('SELECT category FROM categories');
            $sql->execute();

            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $dados;

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getCode();
        }

    }

    public static function setNewCategory($category){

        try {
            
            $sql = self::$pdo->prepare('INSERT INTO categories(category) VALUE(:c)');
            $sql->bindValue(':c',$category);
            $sql->execute();

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }

    }


}