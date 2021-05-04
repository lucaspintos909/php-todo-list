<?php
include_once 'views/includes/header.php';
?>


<div class="container p-4">
    <h4 class=" mb-3 text-primary">Bienvenidx <?= $this->data['user_data']['username'] ?>!</h4>

    <div id="editTaskModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php constant('URL') ?>tasks/editTask" method="POST">
                    <div class="modal-body">

                        <div class="d-none">
                            <input id="modal_id_input" type="text" name="id" class="hidden">
                        </div>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input id="modal_title_input" type="text" name="title" class="form-control"
                                placeholder="Escriba aquí">
                        </div>

                        <div class="form-group ">
                            <label for="description">Descripción</label>
                            <textarea id="modal_description_input" name="description" class="form-control" rows="2"
                                placeholder="Escriba aquí"></textarea>
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
        <?php $this->showMessages(); ?>
    </div><!-- Para borrar todos los datos de la sesion-->
    <div class="row">

        <div class="col-md-4">

            <div class="card card-body">
                <form action="<?php constant('URL'); ?>/tasks/saveTask" method="POST">

                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" class="form-control" placeholder="Escriba aquí" autofocus>
                    </div>

                    <div class="form-group ">
                        <label for="description">Descripción</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Escriba aquí"></textarea>
                    </div>
                    <input class="btn btn-success btn-block" type="submit" name="save_task" value="Crear tarea">

                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->data['data'] as $task){ ?>
                    <tr>
                        <td class="table-item"><?php echo $task->getTitle(); ?></td>
                        <td class="table-item"><?php echo $task->getDescription(); ?></td>
                        <td class="table-item"><?php echo $task->getCreatedAt(); ?></td>

                        <!-- Pasando por parametro los datos de la tarea para poder mostrarlos al editarla -->
                        <td class="">
                            <div class="buttons">
                                
                                <a onclick="showModal(<?php echo $task->getId();?>, '<?= $task->getTitle();?>', '<?= $task->getDescription();?>')"
                                    class="btn btn-info" aria-label="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-danger" href="<?php constant('URL') ?>tasks/deleteTask?id=<?php echo $task->getId();?>"
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

<?php
include_once 'views/includes/footer.php';
?>