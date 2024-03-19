<?php 

class loginController extends Controller{

    public function  index(){
        if(isset($_SESSION['accessLevel'])){
            header('location: home');
        }

        $this->carregarTemplate('login',$dados = [],'Login',[]);

    }

    public function validate(){

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('location: /armazem/login');
        }

        if(!empty($_POST)){

            $user       =  htmlspecialchars($_POST['user']);
            $password   =  htmlspecialchars($_POST['pass']);

            $userClass = new Usuario;
            $dadosUser = $userClass::getUser($user);

            if(count($dadosUser) <= 0){
                header('location: /armazem/login');
            }
            
            for($i = 0;$i < count($dadosUser);$i++){
                
                if($dadosUser[$i]['accessLevel'] == 2){
                    header('location: /armazem/login'); 
                }else if(password_verify($password,$dadosUser[$i]['password'])){
                    $_SESSION['accessLevel'] = $dadosUser[$i]['accessLevel'];
                    $_SESSION['name'] = $dadosUser[$i]['name'];
                    
                    header('location: /home');
                }else{
                    header('location: /armazem/login');
                }
            }
        }

    }

    public function logout(){
        if($_SESSION['name']){
            session_destroy();
            header('location:   \login ');
        }
    }

}