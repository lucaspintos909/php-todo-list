<?php


class Settings extends SessionController
{
    public function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('settings/index');
    }


}