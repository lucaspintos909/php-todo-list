<?php

require_once 'models/loginmodel.php';
class Login extends SessionController{

    function __construct(){
        parent::__construct();
        error_log("EN LOGIN!!");
    }

    function render(){
        $this->view->render('login/index');
    }

    function authenticate(){
        if($this->existPOST(['email', 'password'])){
            $email = $this->getPOST('email');
            $password = $this->getPOST('password');

            # Verifica si hay campos vacios
            if($this->emptyVariables([$email, $password])){
                
                $this->redirect('login',['error' => ErrorMessages::ERROR_USER_EMPTY]);
            
            # Verifica si el mail es valido
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->redirect('login',['error' => ErrorMessages::ERROR_USER_EMAIL]);
            }
            #error_log("&&&&&&&&&&&&&&&&&&&&&&&&&&& " . var_dump($this));
            
            #$model = new LoginModel();
            $user = $this->model->login($email,$password);
            
            if($user != NULL){
                $this->initialize($user);
            }else{
                $this->redirect('login',['error' => ErrorMessages::ERROR_USER_INCORRECT]);
            }

        }else {
            $this->redirect('login',['error' => ErrorMessages::ERROR_USER_CREATED]);
        }

    }
}