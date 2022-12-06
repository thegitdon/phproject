<?php
include('db.php');
//require_once 'db.php';
$status = $statusMsg = '';
if (isset($_POST['save_task'])) {
    $status = 'error';
    if (!empty($_FILES["picture"]["name"])) {
        $fileName = basename($_FILES["picture"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['picture']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            //$insert = $db->query("INSERT into task (picture) VALUES ('$imgContent')");
            $query = "INSERT INTO task(picture) VALUES ('$imgContent')";
            $result = $conn->query($query);
            if ($result) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            } //
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        } //
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}
echo $statusMsg;
/*$title = $_POST['title'];
    $desc = $_POST['description'];
    //echo $title . "&" . $desc;
    $query = "INSERT INTO task(title, description, picture) VALUES ('$title', '$desc', '$imagen')";
    //$result = mysqli_query($conn, $query);
    $result = $conn->query($query);
    if (!$result) {
        die("Query Failed.");
    }
}
    */
$_SESSION['message'] = 'Task Saved Successfully';
$_SESSION['message_type'] = 'success';
header('Location: index.php');
?>