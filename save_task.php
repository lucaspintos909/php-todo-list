<?php

    include("./db.php");

    if(isset($_POST['save_task'])){
        $title=htmlentities($_POST['title'],ENT_COMPAT);
        $description=htmlentities($_POST['description'],ENT_COMPAT);

        $query="INSERT INTO task(title, description) VALUES ('$title', '$description')";

        $res = mysqli_query($conn, $query);

        if(!$res){
            die("Query failed");
        }

        $_SESSION['message'] = "Task saved succesfully!";
        $_SESSION['message_type'] = "primary";
        header("Location: index.php");  

    }
?>