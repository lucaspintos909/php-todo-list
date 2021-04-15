<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
        error_log("EN LOGIN!!");
    }

    function render(){
        $this->view->render('login/index');
    }
}