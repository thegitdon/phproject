<?php
# Shift + Alt + F
include("db.php");
include("header.php")
?>
<?php

session_start();
error_reporting(0);
//identificar usuario por medio de...
// $varsesion = $_SESSION['uname'];

/*if (!isset($_SESSION['rol'])) {
    header("Location: login.php");
} else {
    if ($_SESSION['rol'] != 1) {
        header("Location: login.php");
    }
}*/
if (!isset($_SESSION['uname'])) {
    //header("Location: login.php");
    //echo "OJO";
    header("Location: login.php");
    die();
}


?>
<h2>Bienve <?php echo $_SESSION['uname'] ?></h2>
<div class="container p-2">
    <div class="row">
        <div class="col-md-4">
            <!---->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <!--pintar mensaje--><?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <!--se captura name="title" para transacciones-->
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="3" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="picture">
                    </div>
                    <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
                    <a href="logout.php">Bye!</a>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM task";
                    //$result_tasks = mysqli_query($conn, $query);
                    $res = $conn->query($query);

                    //recorrer uno a uno
                    //while ($row = mysqli_fetch_assoc($result_tasks)) {
                    //$row = mysqli_fetch_array($res); if relaciones
                    while ($row = $res->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['fecha_crea']; ?></td>
                            <td><img style="width: 150px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['picture']) ?>" alt=""></td>
                            <td>
                                <!--if (editar o eliminar) {necesito capturar "id"}-->
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <!--Edit--><i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include("footer.php") ?>