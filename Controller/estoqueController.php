<?php

class estoqueController extends Controller{

    public function  index(){
        
        
        $dados = $this->estoque();
        
        $this->carregarTemplate('painelStorage',$dados);

    }

    protected function estoque(){

        $produtos = new Product;
        $dados = $produtos::getProduto();

        return $dados;

    }

    public function adicionar(){

        $id = htmlspecialchars($_GET['num']);
        
        $produtos = new Product;
        $dados = $produtos::getEstoque($id);

        print_r($dados);
        $produtos::addEstoque($id);

        header('location: \armazem/estoque ');

    }

    public function remover(){

        $id = htmlspecialchars($_GET['num']);
        
        $produtos   = new Product;
        $dados      = $produtos::getEstoque($id);

        $produtos::removeEstoque($id);

        header('location: \armazem/estoque ');

    }

}