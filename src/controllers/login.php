<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();
        error_log("EN LOGIN!!");
    }

    function render(){
        $this->view->render('login/index');
    }
}