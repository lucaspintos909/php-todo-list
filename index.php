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
        <div class="col-md-4"></div>
    </div>

</div>

<?php
include('./includes/footer.php')
?>