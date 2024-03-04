<?php

class estoqueController extends Controller{

    private $produto;

    public function __construct() {
        session_start();

        $this->produto = new Product;
    }

    public function  index(){
        
        if(!isset($_SESSION['accessLevel'])){
            header('location: login');
        }
        
        $dados = $this->estoque();
        
        $this->carregarTemplate('productList',$dados,'Estoque',[]);

    }

    public function getEstoqueJson(){
        $dados = $this->produto::getProduto();

        echo json_encode($dados);
    }
    
    protected function estoque(){
        
        $dados = $this->produto::getProduto();
        
        return $dados;
        
    }
    
    protected function entrada(){
        
        $dados = $this->produto::getProductEntry();
        
        $this->carregarTemplate('productInputList',$dados,'Registro de entrada de produtos',$dados = []);
        
    }
    
    public function produto(){
        
        $dados = $this->estoque();
        $categories = $this->getCategories();
        
        $this->carregarTemplate('registerProdcut',$dados,'Novo Produto',$categories);

    }

    public function alterarEstoque(){
        $dados = $_GET;

        if(!isset($dados['adicionar']) || empty($dados['adicionar'])){
            header('location: \armazem/estoque ');
        }
        
        if(array_key_exists('adicionar',$dados) && !empty($dados['adicionar'])){
            $this->adicionar($dados['adicionar'],$dados['quant']);
        }
        if(array_key_exists('remover',$dados) && !empty($dados['adicionar'])){
            $this->remover($dados['remover'],$dados['quant']);
        }
    }

    public function adicionar(int $id,int $quant){

        $dados = $this->produto::getEstoque($id);

        $this->produto::addEstoque($id,$quant);

        header('location: \armazem/estoque ');

    }

    public function remover(int $id,int $quant){

        $dados  = $this->produto::getEstoque($id);

        $this->produto::removeEstoque($id,$quant);

        header('location: \armazem/estoque ');

    }

    public function newProduct() {
        if (isset($_POST) && !empty($_POST)) {
            
            $code       = htmlspecialchars($_POST['code']);
            $name       = htmlspecialchars($_POST['name']);
            $price      = htmlspecialchars($_POST['price']);
            $estoque    = htmlspecialchars($_POST['estoque']);
            $category    = htmlspecialchars($_POST['category']);

            $this->produto::newProduto($code,$name,$price,$estoque,$category);

        }

        header('location: /armazem/estoque');
    }

    public function categoria(){

        if(!isset($_SESSION['accessLevel'])){
            header('location: login');
        }

        $this->carregarTemplate('registerCategory',[],'Nova categoria',[]);

    }

    public function getCategories(){
        $categories = $this->produto::getCategories();

        return $categories;
    }

    public function setCategory(){
        $category = htmlspecialchars($_POST['category']);
        $category = ucfirst($category);

        $this->produto::setNewCategory($category);

        header('location: \armazem\estoque');
    }
}