<?php

session_start();

//phpinfo();

$conn = mysqli_connect('docker-mysql-db', 'lucas', '123456', 'php-mysql');

if(!isset($conn)){
    print("Connection to DB failed!!");
}

//mysqli_close($connection)
?>