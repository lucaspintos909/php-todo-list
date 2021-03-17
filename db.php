<?php

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud_mysql'
);

if(isset($connection)){
    print("DB is connected.");
}

?>