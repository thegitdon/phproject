<?php
include('db.php');
//require_once 'db.php';
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $fileName = basename($_FILES["picture"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        $image = $_FILES['picture']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $query = "INSERT INTO task(title, description, picture) VALUES ('$title', '$desc', '$imgContent')";
    $result = $conn->query($query);
    if (!$result) {
        die("Query Failed.");
    }
}
$_SESSION['message'] = 'Task Saved Successfully';
$_SESSION['message_type'] = 'success';
header('Location: index.php');
