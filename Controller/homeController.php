<?php

class homeController extends Controller{

    public function __construct() {
        session_start()        ;
    }

    public function  index(){
        
        $this->carregarTemplate('home');

    }

}