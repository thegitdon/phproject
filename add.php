<?php
include('db.php');
//validar captura de datos desde index or form
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    //echo $title . "&" . $desc;
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$desc')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    }
    //echo " &:)";
    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}
