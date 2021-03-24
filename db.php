<?php

//phpinfo();
$connection = mysqli_connect('db', 'root', '', 'php-mysql');

if(isset($connection)){
    //print("DB connected!!   ");
}

mysqli_close($connection)
?>