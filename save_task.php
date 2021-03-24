<?php

    include("./db.php");

    if(isset($_POST['save_task'])){
        $title=$_POST['title'];
        $description=$_POST['description'];

        $query="INSERT INTO task(title, description) VALUES ('$title', '$description')";

        $res = mysqli_query($conn, $query);

        if(!$res){
            die("Query failed");
        }else{
            echo "Saved!";
        }

    }
?>