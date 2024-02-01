<?php

class Controller{

    public $dados;

    public function __construct() {
        $this->dados  = [];
    }

    public function carregarTemplate($nomeView, $dadosModel = []){
            
        $this->dados = $dadosModel;
        require 'View/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = []){
        extract($dadosModel);
        require 'View/'.$nomeView.'.php';
    }

}