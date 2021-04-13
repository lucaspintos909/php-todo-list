<?php

session_start();

//phpinfo();

$conn = mysqli_connect('db', 'lucas', '123456', 'php-mysql');

if(!isset($conn)){
    print("Connection to DB failed!!");
}

//mysqli_close($connection)