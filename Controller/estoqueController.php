<?php

class estoqueController extends Controller{

    private $produto;

    public function __construct() {
        session_start();

        $this->produto = new Product;
    }

    public function  index(){
        
        
        $dados = $this->estoque();
        
        $this->carregarTemplate('painelStorage',$dados);

    }
    
    protected function estoque(){
        
        $dados = $this->produto::getProduto();
        
        return $dados;
        
    }
    
    public function  produto(){
        
        $dados = $this->estoque();
        
        $this->carregarTemplate('registerProdcut',$dados);

    }

    

    public function adicionar(){

        $id = htmlspecialchars($_GET['num']);
        
        $dados = $this->produto::getEstoque($id);

        print_r($dados);
        $this->produto::addEstoque($id);

        header('location: \armazem/estoque ');

    }

    public function remover(){

        $id = htmlspecialchars($_GET['num']);
        
        $produtos   = new Product;
        $dados      = $produtos::getEstoque($id);

        $produtos::removeEstoque($id);

        header('location: \armazem/estoque ');

    }

    public function newProduct() {
        if (isset($_POST) && !empty($_POST)) {
            
            $name       = htmlspecialchars($_POST['name']);
            $price      = htmlspecialchars($_POST['price']);
            $estoque    = htmlspecialchars($_POST['estoque']);

            $this->produto::newProduto($name,$price,$estoque);

        }

        header('location: /armazem/estoque');
    }

}