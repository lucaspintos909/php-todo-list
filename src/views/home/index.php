<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon.svg" />
    <title>Tasks CRUD</title>
    
    <!--  Mis estilos  -->
    <!-- <link rel="stylesheet" href="./assets/styles.css"> -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a5d3bd51fc.js" crossorigin="anonymous"></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="#" class="navbar-brand">PHP MYSQL CRUD</a>
    <div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#">Registro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
        
    </div>
  </div>
</nav>




<div class="container p-4">
    <div id="editTaskModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="edit_task.php" method="POST">
                    <div class="modal-body">

                        <div class="d-none">
                            <input id="modal_id_input" type="text" name="id" class="hidden">
                        </div>

                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input id="modal_title_input" type="text" name="title" class="form-control"
                                placeholder="Type here">
                        </div>

                        <div class="form-group ">
                            <label for="description">Descripcion</label>
                            <textarea id="modal_description_input" name="description" class="form-control" rows="2"
                                placeholder="Escriba aqui"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary w-10" type="submit" name="edit_task" value="Guardar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="alert-fixed">
        <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">

            <?php if($_SESSION['message_type'] == 'danger'){ ?>
                <i class="fas fa-fire-alt mr-1"></i>
            <?php }elseif($_SESSION['message_type'] == 'primary') { ?>
                <i class="fas fa-clipboard-check mr-1"></i>
            <?php }elseif($_SESSION['message_type'] == 'success') { ?>
                <i class="fas fa-pencil-alt mr-1"></i>
            <?php } ?>

            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php session_unset();} ?> <!-- Para borrar todos los datos de la sesion-->
    </div>
    <div class="row">

        <div class="col-md-4">

            <div class="card card-body">
                <form action="./save_task.php" method="POST">

                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" name="title" class="form-control" placeholder="Escriba aqui" autofocus>
                    </div>

                    <div class="form-group ">
                        <label for="description">Descripcion</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Escriba aqui"></textarea>
                    </div>
                    <input class="btn btn-success btn-block" type="submit" name="save_task" value="Crear tarea">

                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $get_tasks_query="SELECT * FROM task";
                      $res = mysqli_query($conn, $get_tasks_query);
                      
                      while($task = mysqli_fetch_array($res)){ ?>
                    <tr>
                        <td><?= $task['title']; ?></td>
                        <td><?= $task['description']; ?></td>
                        <td><?= $task['created_at']; ?></td>
                        <td class="">
                            <div class="buttons">
                                <!-- Pasando por parametro los datos de la tarea para poder mostrarlos al editarla -->
                                <a onclick="showModal(<?php echo $task['id']?>, '<?= $task['title']?>', '<?= $task['description']?>')"
                                    class="btn btn-info" aria-label="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-danger" href="delete_task.php?id=<?php echo $task['id']?>"
                                    aria-label="Eliminar">
                                    <i class="fas fa-backspace"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>

</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- <script src="./assets/index.js"></script> -->
</body>
</html>