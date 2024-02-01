<?php

spl_autoload_register(function($nomeArquivo){
    if(file_exists('Controller/'.$nomeArquivo.'.php')){

        require 'Controller/'.$nomeArquivo.'.php';

    }elseif(file_exists('Core/'.$nomeArquivo.'.php')){
        
        require 'Core/'.$nomeArquivo.'.php';

    }elseif(file_exists('Model/'.$nomeArquivo.'.php')){

        require 'Model/'.$nomeArquivo.'.php';

    }
});