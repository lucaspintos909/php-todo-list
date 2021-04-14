<?php

    class View{

        function __construct(){

        }


        function render($name, $data = []){

            $this->data = $data;

            require_once 'views/' . $name . '.php';

        }

    }