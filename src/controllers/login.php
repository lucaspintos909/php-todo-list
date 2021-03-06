<?php

require_once 'models/loginmodel.php';
class Login extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('auth/login');
    }

    function authenticate(){
        // Para saber de que pagina viene la solicitud, auth/login
        $origin_page = $this->getGET('origin_page');
        if($this->existPOST(['email', 'password'])){
            $email = $this->getPOST('email');
            $password = $this->getPOST('password');
            # Verifica si hay campos vacios
            if($this->emptyVariables([$email, $password])){
                
                $this->redirect($origin_page,['error' => ErrorMessages::ERROR_USER_EMPTY]);
            
            # Verifica si el mail es valido
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->redirect($origin_page,['error' => ErrorMessages::ERROR_USER_EMAIL]);
            }
            
            $user = $this->model->login($email, $password);

            if($user != NULL){
                $this->initialize($user);
            }else{
                $this->redirect($origin_page,['error' => ErrorMessages::ERROR_USER_INCORRECT]);
            }

        }else {
            $this->redirect($origin_page,['error' => ErrorMessages::ERROR_USER_CREATED]);
        }

    }
}