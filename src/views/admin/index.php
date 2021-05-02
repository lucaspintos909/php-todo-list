<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
</head>
<body>
    <h1>Admin Page</h1>

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
</body>
</html>