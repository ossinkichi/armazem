<?php 
class loginController extends Controller{

    public function  index(){
        
        $this->carregarTemplate('login');

    }

    public function validate(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

            $user       =  htmlspecialchars($_POST['user']);
            $password   =  htmlspecialchars($_POST['pass']);

            $userClass = new Usuario;
            $dadosUser = $userClass::getUser($user);
            
            for($i = 0; $i < count($dadosUser); $i++){
                if($dadosUser[$i]['name'] == $user){
                    if($dadosUser[$i]['pass'] == $password){

                        session_id();
                        session_start();

                        header('location: /armazem/home');

                    }else{
                        header('location: /armazem/login');
                    }
                }else{
                    header('location: /armazem/login');
                }
            }

        }
        
    }

}