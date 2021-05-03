<?php
include_once 'views/includes/header.php';
?>

<div class="container">

    <h1 class="">Admin Page</h1>

    <?php
        foreach ($this->data as $user){
            echo $user->getId();
            echo "<br>";
            echo $user->getUsername();
            echo "<br>";
            echo $user->getEmail();
            echo "<br>";
            echo $user->getRole();
            echo "<br>";
        }
    ?>


</div>


<?php
include_once 'views/includes/footer.php';
?>