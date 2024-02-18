<?php

class homeController extends Controller{

    public function  index(){
        session_start();
        if(!isset($_SESSION['accessLevel'])){
            header('location: /armazem/login');
        }
        $this->carregarTemplate('home',[],'Home');
        print_r($_SESSION);

    }

}