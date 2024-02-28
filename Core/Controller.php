<?php

class Controller{

    public array $dados;
    public array $dados2;
    public string $title;

    public function __construct() {
        $this->dados  = [];
    }

    public function carregarTemplate($nomeView, $dadosModel = [],$title,$dados2){
            
        $this->dados = $dadosModel;
        $this->dados2 = $dados2;
        require 'View/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = []){
        // extract($dadosModel);
        require 'View/'.$nomeView.'.php';
    }

}