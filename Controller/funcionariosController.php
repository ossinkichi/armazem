<?php

class funcionariosController extends Controller{

    private $user;

    public function __construct() {
        session_start();

        $this->user = new Usuario;
    }

    public function  index(){
        if(!isset($_SESSION['accessLevel'])){
            header('location: login');
        }

        $dados = $this->users();
        
        $this->carregarTemplate('listOfEmployees',$dados,'Funcionarios',[]);

    }

    protected function users() {
        
        $dados = $this->user::getUsers();

        return $dados;

    }

    public function getEmployees(){
        $dados = $this->user::getUsers();

        echo json_encode($dados);
    }

    public function alterar(){

        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            header('location: \armazem\home');
        }

        if(!isset($_GET['pos']) || empty($_GET['pos'])){
            header('location: \armazem\home');
        }


        if(isset($_GET) && !empty($_GET)){
            $id = htmlspecialchars($_GET['pos']);
            $dados = $this->user::perfil($id);
        }

        $this->carregarTemplate('ChangeEmployeeData',$dados??[],'Funcionarios',[]);
    }

    public function register() {
        if($_SESSION['accessLevel'] != 0 || !isset($_SESSION['accessLevel']) || !empty($_SESSION['accessLevel'])){
            header('location: \armazem\funcionarios');
        }
        $this->carregarTemplate('RegisterNewEmployee',$dados = [],'Registrar novo funcionario',[]);
    }

    public function newRegister() {

       if(isset($_POST) && !empty($_POST)){
            $name           = htmlspecialchars($_POST['name']);
            $password       = htmlspecialchars($_POST['pass']);
            $password       = password_hash($password,PASSWORD_DEFAULT);
            $dateOfBirth    = htmlspecialchars($_POST['dateOfBirth']);
            $gender         = htmlspecialchars($_POST['gender']);
            $mail           = htmlspecialchars($_POST['e-mail']);
            $phone          = htmlspecialchars($_POST['phone']);
            $accessLevel    = htmlspecialchars(intval($_POST['accessLevel']));

            $this->user::setNewUser($name,$password,$dateOfBirth,$gender,$mail,$phone,$accessLevel);

        }
        header('location: /armazem/funcionarios');
    }

    public function desligar() {
        if(isset($_GET) && !empty($_GET)){
            $id = htmlspecialchars($_GET['pos']);

            $this->user::desativar($id);

        }
        header('location: /armazem/funcionarios');
    }

    public function religar() {
        if(isset($_GET) && !empty($_GET)){
            $id = htmlspecialchars($_GET['pos']);

            $this->user::ativar($id);

        }
        header('location: /armazem/funcionarios');
    }

}