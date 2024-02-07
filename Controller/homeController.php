<?php

class homeController extends Controller{

    public function  index(){
        session_start();
        if(empty($_SESSION)){
            header('location: /armazem/login');
        }
        $this->carregarTemplate('home',[],'Home');
        print_r($_SESSION);

    }

}