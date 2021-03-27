<?php
    include("./db.php");

    if(isset($_GET['id'])){
        $task_id = $_GET['id'];

        $delete_task_query = "DELETE FROM task WHERE id = $task_id";

        $result = mysqli_query($conn, $delete_task_query);

        if(!$result){
            die("Query failed");
        }

        $_SESSION['message'] = "Tarea eliminada correctamente.";
        $_SESSION['message_type'] = "danger";

        header("Location: index.php");
        die();
    } 
?>