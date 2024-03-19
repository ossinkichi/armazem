<?php

class estoqueController extends Controller{

    private $produto;

    public function __construct() {
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
    
    public function entrada(){
        
        $dados = $this->produto::getProductEntry();
        
        $this->carregarTemplate('productInputList',$dados,'Registro de entrada de produtos',[]);
        
    }
    
    public function produto(){
        
        $dados = $this->estoque();
        $categories = $this->getCategories();
        
        $this->carregarTemplate('registerProduct',$dados,'Novo Produto',$categories);

    }

    public function alterarEstoque(){
        $dados = $_GET;

        if(!isset($dados['amount']) || empty($dados['amount'])){
            header('location: \armazem/estoque ');
        }

        if(!isset($dados['code']) || empty($dados['code'])){
            header('location: \armazem/estoque ');
        }
        
        if(array_key_exists('code',$dados)){
            $amount = htmlspecialchars($dados['amount']);
            $code  = htmlspecialchars($dados['code']);
            $this->adicionar($code,$amount);
        }
    }

    public function adicionar(int $code,int $amount){

        $dados = $this->produto::getEstoque($code);
        $nameProduct    = $dados['name'];
        $date           = date('y-m-d');
        $newStosk       = $dados['inStock'] += $amount;


        $this->produto::productEntry($code,$nameProduct,$amount,$date);
        $this->produto::addEstoque($code,$newStosk);



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

        header('location: \armazem\estoque\produto');
    }

    public function pedido(){

        $this->carregarTemplate('registerOrder',[],'Estoque',[]);

    }

    public function addOrder(){
        echo json_encode($_POST);

        $code   = htmlspecialchars($_POST['code']);
        $name   = htmlspecialchars($_POST['name']);
        $amount = htmlspecialchars($_POST['amount']);
        $author = htmlspecialchars($_SESSION['name']);
        $date   = date('y-m-d');

        $this->produto::setNewOrder($code,$name,$amount,$author,$date);
    }

    public function pedidos(){
        $dados = $this->produto::getOrder();

        $this->carregarTemplate('orderList',$dados,'Pedidos de reposição do estoque',[]);
    }

    public function  acceptOrder() {
        $id = htmlspecialchars($_GET['code']);

        $this->produto::acceptOrder($id);

        header('location: \estoque/pedidos');
    }
}