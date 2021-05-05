<?php


class Admin extends SessionController
{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('admin/index', $this->model->getAllUsers());
    }
}