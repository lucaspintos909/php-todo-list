<?php

class Auth extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('auth/index');
    }

}