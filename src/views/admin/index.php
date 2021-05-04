<title>Admin Page</title>
<?php
include_once 'views/includes/header.php';
?>
<div class="container">

    <h1 class="text-center mt-4">Admin Page</h1>
    <div class="col-md-8 m-auto pt-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($this->data['data'] as $user){ ?>
                <tr>
                    <td><?php echo $user->getId(); ?></td>
                    <td><?php echo $user->getUsername(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td><?php echo $user->getRole(); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>



</div>


<?php
include_once 'views/includes/footer.php';
?>