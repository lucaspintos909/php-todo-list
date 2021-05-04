<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icons/favicon.svg" />
    <title>Tasks CRUD</title>

    <!--  Mis estilos  -->
    <link rel="stylesheet" href="assets/styles.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a5d3bd51fc.js" crossorigin="anonymous"></script>

</head>

<body class="body">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container container-fluid">

        <a href="<?php constant('URL')?>" class="navbar-brand font-caveat title-navbar">
            <img src="assets/icons/favicon.svg" class="icon-nav">
            <?= $_SERVER['REQUEST_URI'] == '/admin' ? "Todo List Admin Page" : "Todo List" ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php constant('URL')?>">Configuración</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php constant('URL')?>logout">Cerrar Sesión</a>
                </li>
            </ul>

        </div>
    </div>
</nav>