<?php

# Controlador base
class Controller{

    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/' . $model . '/model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model . 'Model';

            $this->model = new $modelName();
            
        }

    }

    function existPOST($params){
        # Verifica que cada parametro que se le pasa a la funcion exista en $_POST
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                error_log("CONTROLLER::existPOST => Faltan parametros"); # Mando un mensaje de error a los log de php
                return false;
            }
        }

        return true;
    }
    
    function existGET($params){
        # Verifica que cada parametro que se le pasa a la funcion exista en $_GET
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                error_log("CONTROLLER::existGET => Faltan parametros"); # Mando un mensaje de error a los log de php
                return false;
            }
        }

        return true;
    }

    function getGET($param){
        return $_GET[$param];
    }

    function getPOST($param){
        return $_POST[$param];
    }

}