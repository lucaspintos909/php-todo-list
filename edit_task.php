<?php
    
    include("./db.php");

    if(isset($_POST['edit_task'])){

        $id = htmlentities($_POST['id']);
        $title = htmlentities($_POST['title']);
        $description = htmlentities($_POST['description']);


        $query="UPDATE task SET title='$title', description='$description' WHERE id=$id";

        $res = mysqli_query($conn, $query);

        if(!$res){
            die("Query failed");
        }
        $_SESSION['message'] = "Task edited successfully!";
        $_SESSION['message_type'] = "success";
        header("Location: index.php"); 
    }



?>