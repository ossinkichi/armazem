<?php

class Core extends Controller{

    public function __construct(){
        $this->run();
    }

    public function run(){


        $url = $_SERVER['REQUEST_URI'];

        $url = explode('/',ltrim($url, '/'));
        array_shift($url);

        if(!empty($url[0])){

            $controller = $url[0].'Controller';
            array_shift($url);
       
            if(isset($url[0]) && !empty($url[0])){
                $method = $url[0];
                array_shift($url);
                
            }else{
                $method = 'index';
            }

            if(!empty($url[0])){
                $params = $url[0];
                array_shift($url);
            }
        }else{
            $controller = 'homeController';
            $method = 'index';
        }

        $caminho = 'Controller/'.$controller.'.php';

        if(!file_exists($caminho) || !method_exists($controller,$method)){
            $c = new errorController;
            $method = 'notFound';
            call_user_func_array(array($c,$method),$params = []);
        }


        if(file_exists($caminho) && method_exists($controller,$method)){
            $c = new $controller;
            call_user_func_array(array($c,$method),$params = []);
        }



        
    }
    
}