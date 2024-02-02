<?php

class funcionariosController extends Controller{

    private $user;

    public function __construct() {
        session_start();

        $this->user = new Usuario;
    }

    public function  index(){

        $dados = $this->users();
        
        $this->carregarTemplate('painelServant',$dados);

    }

    protected function users() {
        
        $dados = $this->user::getUsers();

        return $dados;

    }

    public function perfil() {
        
        if(isset($_GET) && !empty($_GET)){
            $dado = htmlspecialchars($_GET['pos']);
            $dados = $this->user::perfil($dado);
        }

        $this->carregarTemplate('perfil',$dados);
    }

    public function register() {
        $this->carregarTemplate('registerServant');
    }

    public function newRegister() {

       if(isset($_POST) && !empty($_POST)){
            $name           = htmlspecialchars($_POST['name']);
            $password       = htmlspecialchars($_POST['pass']);
            $dateOfBirth    = htmlspecialchars($_POST['dateOfBirth']);
            $gender         = htmlspecialchars($_POST['gender']);
            $mail           = htmlspecialchars($_POST['e-mail']);
            $phone          = htmlspecialchars($_POST['phone']);
            $accessLevel    = htmlspecialchars($_POST['accessLevel']);

            $this->user::setUser($name,$password,$dateOfBirth,$gender,$mail,$phone,$accessLevel);

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