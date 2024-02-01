<?php

class relatorioController extends Controller{
   
    public function __construct() {
        session_start()        ;
    }

    public function  index(){
        
        $this->carregarTemplate('painelReport');

    }

}