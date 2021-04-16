<?php

include_once 'models/usermodel.php';
class Signup extends SessionController{

    function __construct(){
        parent::__construct();

    }

    function render(){
        $this->view->render('login/signup', []);
    }

    function newUser(){
        if ($this->existPOST(['username', 'email', 'password', 'second_password'])) {
            
            $username = $this->getPOST('username');
            $email = $this->getPOST('email');
            $password = $this->getPOST('password');
            $second_password = $this->getPOST('second_password');
            
            # Verifica si hay campos vacios
            if($this->emptyVariables([$username, $email, $password, $second_password])){
                
                $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_EMPTY]);
            
            # Verifica si las contraseñas son diferentes
            }elseif (!($password === $second_password)) {

                $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_PASSWORD]);

            # Verifica que el email ingresado sea valido
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_EMAIL]);
            }

            $user = new UserModel();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRole('user');

            # Verifica si existe el usuario
            if($user->existsUser($user->getUsername())){
                $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_EXISTS]);
            }elseif ($user->saveUser()) {
                $this->redirect('login',['success' => SuccessMessages::SUCCESS_USER_CREATED]);
            }else {
                $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_CREATED]);
            }

        }else {
            $this->redirect('signup',['error' => ErrorMessages::ERROR_USER_CREATED]);
        }
    }

    function emptyVariables($variables){
        foreach ($variables as $variable) {
            if($variable == '' || empty($variable)) return true;
        }

        return false;
    } 
}