<?php

class Dashboard extends SessionController{

    function __construct(){
        parent::__construct();
        error_log("EN dashboard!!");
    }

    function render(){
        $this->view->render('dashboard/index');
    }

    
}