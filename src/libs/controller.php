<?php

# Controlador base
class Controller{

    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/' . $model . 'model.php';

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

    function redirect($route, $mensajes){
        $data = [];
        $params = '';

        foreach ($mensajes as $key => $mensaje) {
            array_push($data, $key . '=' . $mensaje); # Me genera un array con los mensajes
        }

        $params = join('&', $data); # Me une todo separado con un & para que funcionen los parametros 
        # Ej: ?nombre=Lucas&apellido=Pintos
        if($params != ''){
            $params = '?' . $params; # Concatenando ? al principio para que funcionen los parametros
        }

        # URL completa a la que se va a redirigir al usuario
        header('Location: ' . constant('URL') . $route . $params); 
    }

}