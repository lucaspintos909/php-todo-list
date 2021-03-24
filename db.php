<?php

session_start();

//phpinfo();

$conn = mysqli_connect('db', 'root', '', 'php-mysql');

if(!isset($conn)){
    print("Connection to DB failed!!");
}

//mysqli_close($connection)
?>