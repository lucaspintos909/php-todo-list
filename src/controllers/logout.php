<?php
class Logout extends SessionController{

    function __construct(){
        parent::__construct();
        $this->logout();
    }

}