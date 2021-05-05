<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="assets/icons/security.svg"/>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body class="body">

<?php
require_once 'views/includes/navbar-auth.php';
?>

<div class="container mt-5">
    <div class="col-md-12 offset-md-1asd">
        <div class="card">
            <div class="card-header text-center">
                <h4>Registrarse</h4>
            </div>

            <div class="card-body">
                <form class="row g-3" action="<?php echo constant('URL'); ?>signup/newUser?origin_page=signup"
                      method="POST">

                    <div class="form-group col-md-6">
                        <label for="username">Nombre de ususario</label>
                        <input name="username" id="username" class="form-control" type="text" placeholder="Ej. Pepe" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input name="email" id="email" class="form-control" type="email"
                               placeholder="nombre@ejemplo.com" required/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input name="password" id="password" class="form-control" type="password"
                               placeholder="Ingrese su contraseña" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="second_password">Confirmar contraseña</label>
                        <input name="second_password" id="second_password" class="form-control" type="password"
                               placeholder="Repita su contraseña" required/>
                    </div>
                    <div class="mt-2 m-auto col-md-12">
                        <?php $this->showMessages(); ?>
                    </div>
                    <div class="form-group mt-3 m-auto col-md-6">
                        <input type="submit" class="btn btn-success btn-block" value="Registrarme"/>
                    </div>

                </form>

                <div class="d-lg-none d-block">
                    <p class="text-center mt-2">O</p>

                    <div class="form-group m-auto col-md-5">
                        <a href="<?php echo constant('URL'); ?>login" class="btn btn-primary btn-block">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
</body>
</html>