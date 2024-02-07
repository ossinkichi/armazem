<?php

class estoqueController extends Controller{

    private $produto;

    public function __construct() {
        session_start();

        $this->produto = new Product;
    }

    public function  index(){
        
        
        $dados = $this->estoque();
        
        $this->carregarTemplate('painelStorage',$dados,'Estoque');

    }
    
    protected function estoque(){
        
        $dados = $this->produto::getProduto();
        
        return $dados;
        
    }
    
    public function produto(){
        
        $dados = $this->estoque();
        
        $this->carregarTemplate('registerProdcut',$dados,'Novo Produto');

    }

    public function alterarEstoque(){
        $dados = $_GET;

        if(empty($dados['adicionar']) || empty($dados['adicionar'])){
            header('location: \armazem/estoque ');
            exit;
        }
        
        if(array_key_exists('adicionar',$dados) && !empty($dados['adicionar'])){
            $this->adicionar($dados['adicionar'],$dados['quant']);
        }
        if(array_key_exists('remover',$dados) && !empty($dados['adicionar'])){
            $this->remover($dados['remover'],$dados['quant']);
        }
    }

    public function adicionar($id,$quant){

        $dados = $this->produto::getEstoque($id);

        print_r($dados);
        $this->produto::addEstoque($id,$quant);

        header('location: \armazem/estoque ');

    }

    public function remover($id,$quant){

        $dados  = $this->produto::getEstoque($id);

        $this->produto::removeEstoque($id,$quant);

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