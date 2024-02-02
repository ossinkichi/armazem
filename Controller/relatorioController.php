<?php

class relatorioController extends Controller{
   
    public function __construct() {
        session_start()        ;
    }

    public function  index(){

        $dados = $this->getRelatorios();
        
        $this->carregarTemplate('painelReport',$dados);

    }

    public function getRelatorios(){

        $relatorios = new Reports;
        $dados = $relatorios::getReports();

        return $dados;

    }

}