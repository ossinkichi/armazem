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

    public static function getEstoque($code){
        try {
            
            $sql = self::$pdo->prepare('SELECT * FROM products WHERE code = :cd');
            $sql->bindValue(':cd',$code);
            $sql->execute();

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            return $dados;

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function addEstoque($code,$amount){
        try {
            
            $sql = self::$pdo->prepare('UPDATE products SET inStock = :em WHERE code = :cd');
            $sql->bindValue(':em',$amount);
            $sql->bindValue(':cd',$code);
            $sql->execute();


        } catch (\PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }
    }

    public static function productEntry($code,$name,$amount,$date){

        try {
            
            $sql = self::$pdo->prepare('INSERT INTO productentry(codeProduct,productName,amount,productInsertionDate) VALUES(:cd,:pn,:a,:dt)');
            $sql->bindValue(':cd',$code);
            $sql->bindValue(':pn',$name);
            $sql->bindValue(':a',$amount);
            $sql->bindValue(':dt',$date);
            $sql->execute();

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }

    }

    public static function getProductEntry(){

        try {
            
            $sql = self::$pdo->prepare('SELECT * FROM productentry ORDER BY id DESC');
            $sql->execute();

            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $dados;

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getCode();
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