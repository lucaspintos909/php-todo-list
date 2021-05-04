<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icons/security.svg" />
    <title>Auth</title>

    <!--  Mis estilos  -->
    <link rel="stylesheet" href="assets/styles.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body class="body">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a href="<?php constant('URL')?>" class="navbar-brand font-caveat title-navbar">
            Todo List Auth
            <img src="assets/icons/lock.svg" class="icon-nav">

        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
            <form action="<?php constant('URL');?>login/authenticate" method="POST" class="d-flex">
                <input name="email" id="email" class="form-control me-2" type="email" placeholder="Email" aria-label="Search">
                <input name="password" id="password" class="form-control me-2 ml-3" type="password" placeholder="Contraseña" aria-label="Password">
                <button class="btn btn-outline-success ml-3" type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</nav>

    <div class="container mt-5">

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
