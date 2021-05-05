<?php
  
class Session{

    private $session_name = 'user';

    public function __construct(){

        # Si no hay una sesion activa, la inicia
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    # Setea el usuario a la sesion
    public function setCurrentUser($user){
        $_SESSION[$this->session_name] = $user;
    }
    
    # Obtiene el usuario de la sesion
    public function getCurrentUser(){
        return $_SESSION[$this->session_name];
    }

    # Cierra la sesion que haya
    public function closeSession(){
        session_unset();
        session_destroy();
    }

    public function exists(){
        return isset($_SESSION[$this->session_name]);
    }
}