<?php

class App{

    function __construct(){
        # Si existe una url la guarda, sino le asigna null
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        # Quitando las / que puedan haber al final de la url
        $url = rtrim($url, '/');
        # Separando la url por /
        $url = explode('/', $url);

        if(empty($url[0])){
            $file_controller = 'controllers/login.php';

            require_once $file_controller; #Cargando el controlador de login

            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }
        # Si no esta vacio se le asigna el controlador
        $file_controller = 'controllers/' . $url[0] . '.php';

        if(file_exists($file_controller)){
            
            require_once $file_controller;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if(isset($url[1])){

                if(method_exists($controller, $url[1])){

                    if(isset($url[2])){
                        # Nro de parametros (le saco los dos primeros del controlador y del metodo)
                        $num_params = count($url) - 2;
                        $params = [];

                        for ($i=0; $i < $num_params; $i++) { 
                            array_push($params, $url[$i] + 2);
                        }

                        $controller->{$url[1]}($params);

                    }else{
                        # No tiene parametros, se llama al metodo tal cual
                        $controller->{$url[1]}(); # Llamado a funcion dinamico
                    }

                }else{
                    # Error, no existe el metodo
                }

            }else{
                # No hay metodo a cargar, carga el default
                $controller->render();
            }

        }else{
            # No existe el archivo, manda error 404
        }
    }
}