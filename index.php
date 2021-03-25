<?php
  include('db.php')
?>

<?php
  include('./includes/header.php')
?>
<div class="container p-4">
    <div id="editTaskModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit task</h5>
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
                            <label for="title">Task title</label>
                            <input id="modal_title_input" type="text" name="title" class="form-control"
                                placeholder="Type here">
                        </div>

                        <div class="form-group ">
                            <label for="description">Task description</label>
                            <textarea id="modal_description_input" name="description" class="form-control" rows="2"
                                placeholder="Type here"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary w-10" type="submit" name="edit_task" value="Save edit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
            <?php } ?>

            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php session_unset();} ?>
    </div>
    <div class="row">

        <div class="col-md-4">

            <div class="card card-body">
                <form action="save_task.php" method="POST">

                    <div class="form-group">
                        <label for="title">Task title</label>
                        <input type="text" name="title" class="form-control" placeholder="Type here" autofocus>
                    </div>

                    <div class="form-group ">
                        <label for="description">Task description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Type here"></textarea>
                    </div>
                    <input class="btn btn-success btn-block" type="submit" name="save_task" value="Save task">

                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $get_tasks_query="SELECT * FROM task";
                      $res = mysqli_query($conn, $get_tasks_query);
                      
                      while($row = mysqli_fetch_array($res)){ ?>
                    <tr>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $row['created_at']; ?></td>
                        <td class="">
                            <div class="buttons">
                                <a onclick="showModal(<?php echo $row['id']?>, '<?= $row['title']?>', '<?= $row['description']?>')"
                                    class="btn btn-info" aria-label="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id']?>"
                                    aria-label="Delete">
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

<script>
function showModal(task_id, task_title, task_description) {
    $('#editTaskModal').modal('show');
    $('#modal_id_input').val(task_id);
    $('#modal_title_input').val(task_title);
    $('#modal_description_input').val(task_description);

}
</script>

<style>
.buttons {
    display: flex;
    justify-content: space-between;
}

.alert-fixed {
    width: fit-content;
    margin: auto;
}

.text-center {
    text-align: center;
}
</style>



<?php
include('./includes/footer.php')
?>