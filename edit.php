<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $imgContent = addslashes(file_get_contents($_FILES['picture']['tmp_name']));

    $query = "UPDATE task set title = '$title', description = '$description', picture = '$imgContent' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}
?>

<?php include("header.php") ?>
<div class="container p-2">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <!--desde dónde obtengo el valor a pintar, "value"-->
                        <!--if(post){name="title"}-->
                        <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="10"><?php echo $description; ?></textarea>
                    </div>
                    <img style="width: 150px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['picture']) ?>" alt="">
                    <div class="form-group">
                        <input type="file" name="picture">
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include("footer.php") ?>