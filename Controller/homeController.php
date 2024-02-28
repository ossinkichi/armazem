<?php

class homeController extends Controller{

    public function  index(){
        session_start();
        if(!isset($_SESSION['accessLevel'])){
            header('location: /armazem/login');
        }
        
        if($_SESSION['accessLevel'] != 2){
            $this->carregarTemplate('home',$dados = [],'Home',[]);
        }else{
            $this->carregarTemplate('painel',$dados = [],'Painel',[]);
        }
    }

}