<?php
  include('db.php')
?>

<?php
  include('./includes/header.php')
?>
<div class="container p-4">
    <div>
        <?php if(isset($_SESSION['message'])){ ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php  session_unset();} ?>
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
                      $query_get_tasks="SELECT * FROM task";
                      $res_tasks=mysqli_query($conn, $query_get_tasks);

                      while($row = mysqli_fetch_array($res_tasks)){ ?>
                        <tr>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['description']; ?></td>
                            <td><?= $row['created_at']; ?></td>
                            <td class="buttons">
                                <a class="btn btn-info rounded-lg" href="edit_task.php?id=<?php echo $row['id']?>" aria-label="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a class="btn btn-danger rounded-lg" href="delete_task.php?id=<?php echo $row['id']?>" aria-label="Delete">
                                    <i class="fas fa-backspace"></i>
                                </a>
                            </td>
                        </tr>
                      <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<style>
.buttons{
    display: flex;
    justify-content: space-between;
}
</style>
<?php
include('./includes/footer.php')
?>