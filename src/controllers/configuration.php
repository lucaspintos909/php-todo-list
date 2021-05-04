<?php


class Configuration extends SessionController
{
    public function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('config/index');
    }


}