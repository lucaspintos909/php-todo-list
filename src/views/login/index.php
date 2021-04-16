<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/icons/login-blue.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
    
    <div class="container mt-5">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Iniciar Sesión</h4>
                </div>

                <div class="card-body">
                    <form action="<?php constant('URL');?>login/authenticate" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" class="form-control" type="email" />
                        </div>

                        <div class="form-group">
                            <div class="row">
                            <div class="col-3">
                                <label for="password">Contraseña</label>
                            </div>
                            </div>

                            <input name="password" id="password" class="form-control" type="password" />
                            <a href="#" class="mt-2">¿Olvidaste la contraseña?<a>
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </form>

                    <p class="text-center">O</p>

                    <div class="form-group">
                    <a href="<?php echo constant('URL');?>signup" class="btn btn-success btn-block">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
