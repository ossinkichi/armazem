<?php

class relatorioController extends Controller{

    private $relatorios;
   
    public function __construct() {
        $this->relatorios = new Reports;

    }

    public function  index(){

        $dados = $this->getRelatorios();
        
        $this->carregarTemplate('listOfReports',$dados,'Relatorios',[]);

    }

    public function getRelatorios(){

        $dados = $this->relatorios::getReports();

        return $dados;

    }

    public function criarRelarios(){
        $this->carregarTemplate('registerReports',[],'Criar Relatorios',[]);
    }

    public function setNewReport(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $author = htmlspecialchars($_POST['author']);
            $report = htmlspecialchars($_POST['report']);
            $code = htmlspecialchars($_POST['code']);
            $date   = date('d/m/y');

            $this->relatorios::setReport($author,$report,$date,$code);

            header('location: /armazem/estoque');
        }

        // echo $date;


    }

}