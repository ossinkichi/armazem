<?php

class homeController extends Controller{

    public function  index(){
        if(!isset($_SESSION['accessLevel'])){
            header('location: /login');
        }
        
        if($_SESSION['accessLevel'] != 2){
            $this->carregarTemplate('home',$dados = [],'Home',[]);
        }
    }

}