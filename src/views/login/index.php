<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

    <div class="container mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Iniciar Sesión</h4>
                </div>

                <div class="card-body">
                    <form>
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
                    <a href="#" class="btn btn-success btn-block">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>
