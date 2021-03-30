<?php
    
    include("./db.php");

    if(isset($_POST['edit_task'])){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];


        $query="UPDATE task SET title='$title',description='$description' WHERE id=$id";

        $res = mysqli_query($conn, $query);

        if(!$res){
            die("Query failed");
        }
        $_SESSION['message'] = "Tarea editada satisfactoriamente!";
        $_SESSION['message_type'] = "success";
        header("Location: ./index.php");
        die();
    }



?>