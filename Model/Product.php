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
            
            $sql = self::$pdo->prepare('SELECT * FROM products WHERE id = :id');
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
            $dado['inStock'] += $quant;
            
            $sql = self::$pdo->prepare('UPDATE products SET inStock = :em WHERE id = :id');
            $sql->bindValue(':em',$dado['inStock']);
            $sql->bindValue(':id',$id);
            $sql->execute();

            self::productEntry($dado['code'],$dado['name'],$quant,date('d/m/y'));

        } catch (\PDOException $errorPdo) {
            return $errorPdo->getMessage();
        }
    }

    public static function productEntry($code,$name,$amount,$date){

        try {
            
            $sql = self::$pdo->prepare('INSERT INTO productentry(productCode,productName,amout,productInsertionDate) VALUES(:c,:n,:a,:d)');
            $sql->bindValue(':c',$code);
            $sql->bindValue(':n',$name);
            $sql->bindValue(':a',$amount);
            $sql->bindValue(':d',$date);
            $sql->execute();

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }

    }

    public static function getProductEntry(){

        try {
            
            $sql = self::$pdo->prepare('SELECT * FROM productentry ORDER BY id DESC');

        } catch (PDOException $errorPdo) {
            echo $errorPdo->getMessage();
        }

    }

    public static function removeEstoque($id,$quant){
        try {

            $dado = self::getEstoque($id);
            $dado['saida']          += $quant;
            $dado['em_estoque']     -= $quant;
            
            $sql = self::$pdo->prepare('UPDATE products SET em_estoque = :em, saida = :s WHERE estoque.id = :id');
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